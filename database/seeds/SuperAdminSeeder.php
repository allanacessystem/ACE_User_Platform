<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('Super_Admin_Users_tbl')->insert([
            'firstName' => 'Allan',
            'lastName' => 'Corda',
            'emailAddress' => 'allan.corda@acesystem.co',
            'password' => Hash::make('password'),
            'phoneNumber' => '6476187046',
            'notes' => 'Super Admin User',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('Super_Admin_Users_tbl')->insert([
            'firstName' => 'api',
            'lastName' => 'ctrl',
            'emailAddress' => 'api.ctrl@acesystem.co',
            'password' => Hash::make('password'),
            'phoneNumber' => '',
            'notes' => 'api-ctrl',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

    }
}
