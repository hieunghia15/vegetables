<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->delete();

        DB::table('units')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'kg',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'tạ',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'tấn',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
        ));
    }
}