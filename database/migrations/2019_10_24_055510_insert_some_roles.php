<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InsertSomeRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('roles')->insert([
            array( 'id'=>'1','name'=>'System Administrator','parent' => '0'),
            array( 'id'=>'2','name'=>'Location Manager','parent' => '1'),
            array( 'id'=>'3','name'=>'Supervisor','parent' => '2'),
            array( 'id'=>'4','name'=>'Employee','parent' => '3'),
            array( 'id'=>'5','name'=>'Trainer','parent' => '3')
           
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

