<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmployeeUsersTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Employee_Users_tbl', function (Blueprint $table) {
            $table->bigIncrements('idEmployee');
		    $table->string('firstName', 45);
		    $table->string('lastName', 45);
		    $table->string('emailAddress', 320);
            $table->string('phoneNumber', 50)->nullable();
            $table->string('password');
		    $table->string('employeeAlias', 45)->nullable();
		    $table->bigInteger('Manager_idEmployee')->unsigned()->nullable();
		    
		    //$table->primary('idEmployee');
		
		    //$table->index('manager_idemployee','fk_employeeusers_idemployee_idx');
		
		    $table->timestamps();
            
        });

        Schema::table('Employee_Users_tbl', function($table) {
            $table->foreign('Manager_idEmployee')->references('idEmployee')->on('Employee_Users_tbl');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Employee_Users_tbl');
    }
}
