<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersAuthTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Users_Auth_tbl', function (Blueprint $table) {
            $table->string('firstName', 45)->nullable();
		    $table->string('lastName', 45)->nullable();
		    $table->string('emailAddress', 320)->nullable();
		    $table->string('Groups_JSON', 45)->nullable();
		    $table->string('authToken_JSON', 45)->nullable();
		    $table->boolean('Locked')->nullable();
		    $table->boolean('Disabled')->nullable();
		    $table->string('loginAuthToken', 45)->nullable();
		
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
        Schema::dropIfExists('Users_Auth_tbl');
    }
}
