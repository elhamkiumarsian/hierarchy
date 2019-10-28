<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;


use RecursiveArrayIterator;
use RecursiveIteratorIterator;


class UserController extends Controller
{
   
    private $tree = [];



    /**
     * @SWG\Get(
     *     path="/users",
     *     description="Display a listing of the users.",
     *     @SWG\Response(
     *         response=200,
     *         description="OK",
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Missing Data"
     *     )
     * )
     */
    public function index() {
        $users=[];
        
        $users =DB::table('users')
        ->join('roles', 'roles.id', '=', 'users.role')
        ->select('users.id AS id','users.name AS name','roles.name AS role','users.created_at','roles.id As role_id')
        ->get();
        $users=$users->toArray();
        $items = Role::pluck('name', 'id');
        return View::make('pages.users', compact('users','items'));
        
    }
    
    
    
    /**
     * @SWG\Post(
     *     path="/users",
     *     description="Store a newly created user in storage.",
     *     @SWG\Parameter(
     *         name="name",
     *         in="query",
     *         type="string",
     *         description="name",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="role",
     *         in="query",
     *         type="string",
     *         description="role",
     *         required=true,
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="OK",
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Missing Data"
     *     )
     * )
     */
    
    public function store(Request $request)
    {
        $request=$request->except('_token');
        DB::table('users')->insert($request);
        return back();
    
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
   

    
    public function buildTree($parentId)
    {
        $this->createTree($parentId);
        return $this;
    }
    
    public function createTree($parentId)
    {
        
        $roles= json_decode(json_encode(DB::table('roles')->get()), true);       
        array_walk($roles, function ($item) use ($parentId) {
            if ($item['parent'] === $parentId) {
                $item['Children'] = $this->buildTree($item['id']);
                $this->tree[] = $item;
                unset($item);
            }
        });
            return $this->tree;    
    }
      
    
    /**
     * @SWG\Get(
     *     path="/users/{user_id}",
     *     description="Display the specified resource",
     *     @SWG\Parameter(
     *         name="id",
     *         in="query",
     *         type="integer",
     *         description="user id",
     *         required=true,
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="OK",
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Missing Data"
     *     )
     * )
     */
    public function subordinates($user_id) {


        $role=User::select('role')->find($user_id);
        $sub=$this->createTree($role->role);
     
        //$users=[];
        foreach($sub as $s){
          $usersRole =DB::table('users')
            ->join('roles', 'roles.id', '=', 'users.role')
            ->select('users.id AS id','users.name AS name','roles.name AS role','users.created_at','roles.id As role_id')
            -> where('role',$s['id'])
            ->get();  
            $usersRole = new RecursiveIteratorIterator(new RecursiveArrayIterator($usersRole->toArray()));

             $list=[];
             foreach($usersRole as $key=>$value) {
             $list[$key]=$value;
             } 
            $users[]=$list;
        }
       
   return View::make('pages.user', compact('users'));      
        
    }
    

}
