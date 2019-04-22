<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustomerUsersTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Customer_Users_tbl', function (Blueprint $table) {
            $table->bigIncrements('idCustomer');
		    $table->string('firstName', 45);
		    $table->string('lastName', 45);
            $table->string('emailAddress', 320);
            $table->string('password');
		    $table->string('phoneNumber', 50);
		    $table->bigInteger('Referal_idCustomer')->unsigned()->nullable();
		    $table->integer('referal_Count')->nullable();
		    
		    //$table->primary('idCustomer');
		    //$table->index('referal_idcustomer','fk_customerusers_idcustomer_idx');
                
            $table->timestamps();
        });

        Schema::table('Customer_Users_tbl', function($table) {
            $table->foreign('Referal_idCustomer')->references('idCustomer')->on('Customer_Users_tbl');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Customer_Users_tbl');
    }
}
