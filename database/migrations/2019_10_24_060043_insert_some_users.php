<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InsertSomeUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert([
            array( 'id'=>'1','name'=>'Adam Admin','role' => '1','created_at' => date('Y-m-d H:i:s')),
            array( 'id'=>'2','name'=>'Emily Employee','role' => '4','created_at' => date('Y-m-d H:i:s')),
            array( 'id'=>'3','name'=>'Sam Supervisor','role' => '3','created_at' => date('Y-m-d H:i:s')),
            array( 'id'=>'4','name'=>'Mary Manager','role' => '2','created_at' => date('Y-m-d H:i:s')),
            array( 'id'=>'5','name'=>'Steve Trainer','role' => '5','created_at' => date('Y-m-d H:i:s'))
            
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

