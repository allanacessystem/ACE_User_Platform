<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SuperAdminUsersTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Super_Admin_Users_tbl', function (Blueprint $table) {
            $table->bigIncrements('idSuperAdmin');
		    $table->string('firstName', 45);
		    $table->string('lastName', 45);
            $table->string('emailAddress', 320);
            $table->string('password');
		    $table->string('phoneNumber', 50)->nullable();
		    $table->string('notes', 45)->nullable();
		    //$table->primary('idSuperAdmin');
		
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Super_Admin_Users_tbl');
    }
}
