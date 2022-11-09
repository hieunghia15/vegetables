<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        DB::table('roles')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'admin',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'farmer',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => '2022-03-24 20:03:23'
            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'customer',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
        ));
    }
}