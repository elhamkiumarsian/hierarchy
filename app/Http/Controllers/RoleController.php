<?php
namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use RecursiveArrayIterator;
use RecursiveIteratorIterator;

class RoleController extends Controller
{
    /**
     * @SWG\Get(
     *     path="/roles",
     *     description="Display a listing of the roles.",
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
   
    public function index()
    {
        $roles = Role::all();
        $items = Role::pluck('name', 'id');
        return View::make('roles', compact('roles', 'items'));
    }


    /**
     * @SWG\Post(
     *     path="/roles",
     *     description="Store a newly created role in storage.",
     *     @SWG\Parameter(
     *         name="name",
     *         in="query",
     *         type="string",
     *         description="name",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="parent",
     *         in="query",
     *         type="string",
     *         description="parent",
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
        $request = $request->except('_token');
        $role=DB::table('roles')->insertGetId($request);

        return back();
    }

    
 
  
}
