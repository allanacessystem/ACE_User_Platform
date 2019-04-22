<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RolePermissionsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Role_Permissions_tbl', function (Blueprint $table) {
            $table->string('fk_idRole', 32);
            $table->bigInteger('fk_idPermission')->unsigned()->nullable();
		    $table->longText('authenticationToken');
		
		    //$table->index('fk_idrole','fk_roles_idrole_idx');
		    //$table->index('fk_idpermission','fk_permissions_idpermission_idx');
		
		    $table->timestamps();
        });

        Schema::table('Role_Permissions_tbl', function($table) {
            $table->foreign('fk_idRole')->references('idRole')->on('Roles_tbl');
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
        Schema::dropIfExists('Role_Permissions_tbl');
    }
}
