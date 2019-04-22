<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GranularRolesTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Grandular_Roles_tbl', function (Blueprint $table) {
            $table->bigInteger('fk_idPermission')->unsigned()->nullable();
		    $table->string('fk_idRole_idGroup', 32);
		    $table->string('name', 255);
		    $table->longText('authenticationToken');
		    $table->longText('composite_Auth_Tokens');
		
		    //$table->index('fk_idPermission','fk_Permissions_idPermission_idx');
		
		    
		
		    $table->timestamps();
        });

        Schema::table('Grandular_Roles_tbl', function($table) {
            $table->foreign('fk_idPermission')->references('idPermission')->on('Permissions_tbl');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Grandular_Roles_tbl');
    }
}
