<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AuthorizationTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Authorization_tbl', function (Blueprint $table) {
            $table->longText('authenticationToken');
		    $table->longText('JSON_Users');
		    $table->string('tableName', 255);
		    $table->longText('group_granRole_role_JSON');
		
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
        Schema::dropIfExists('Authorization_tbl');
    }
}
