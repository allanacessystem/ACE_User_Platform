<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Permissions_tbl')->insert([
            'name'=> 'Create',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('Permissions_tbl')->insert([
            'name'=> 'Read',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('Permissions_tbl')->insert([
            'name' => 'Update',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('Permissions_tbl')->insert([
            'name' => 'Delete',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('Permissions_tbl')->insert([
            'name' => 'Soft-Delete',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
