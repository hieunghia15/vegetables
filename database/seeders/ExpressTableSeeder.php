<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ExpressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expresses')->delete();

        DB::table('expresses')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'Ngoài vùng',
                'price' => '50000',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'Trong vùng',
                'price' => '25000',
                'created_at' => NULL,
                'updated_at' => NULL
            )
        ));
    }
}