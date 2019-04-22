<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SuperAdminEventsHistoryTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Super_Admin_EventsHistory_tbl', function (Blueprint $table) {
            $table->string('eventName', 45)->nullable();
		    $table->string('eventDescription', 45)->nullable();
		    $table->string('createAt', 45)->nullable();
		    $table->bigInteger('fk_idSuperAdmin')->unsigned();
		
		    //$table->index('fk_idsuperadmin','fk_superadminusers_idsuperadmin_idx');
		
		    
            $table->timestamps();
        });

        Schema::table('Super_Admin_EventsHistory_tbl', function($table) {
            $table->foreign('fk_idSuperAdmin')->references('idSuperAdmin')->on('Super_Admin_Users_tbl');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Super_Admin_EventsHistory_tbl');
    }
}
