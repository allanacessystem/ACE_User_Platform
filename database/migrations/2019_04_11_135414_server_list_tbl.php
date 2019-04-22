<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ServerListTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Server_List_tbl', function (Blueprint $table) {
            $table->bigIncrements('idServer');
		    $table->string('serverName', 45)->nullable();
		    $table->string('serverIPAddress', 45)->nullable();
		    $table->string('accessTableName', 45)->nullable();
		    
		    //$table->primary('idServer');
		
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
        Schema::dropIfExists('Server_List_tbl');
    }
}
