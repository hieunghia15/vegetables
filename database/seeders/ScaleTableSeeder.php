<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ScaleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('scales')->delete();

        DB::table('scales')->insert(array(
            0 =>
            array(
                'id' => 1,
                'productivity' => '2 ha',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            1 =>
            array(
                'id' => 2,
                'productivity' => '4 ha',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            2 =>
            array(
                'id' => 3,
                'productivity' => '6 ha',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            3 =>
            array(
                'id' => 4,
                'productivity' => '8 ha',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            4 =>
            array(
                'id' => 5,
                'productivity' => '10 ha',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            5 =>
            array(
                'id' => 6,
                'productivity' => '12 ha',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            6 =>
            array(
                'id' => 7,
                'productivity' => '14 ha',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            7 =>
            array(
                'id' => 8,
                'productivity' => '16 ha',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            8 =>
            array(
                'id' => 9,
                'productivity' => '18 ha',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            9 =>
            array(
                'id' => 10,
                'productivity' => '20 ha',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
        ));
    }
}