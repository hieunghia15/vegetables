<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->delete();

        DB::table('regions')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'Miền Bắc',
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'Miền Trung',
            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'Miền Nam',
            ),
        ));
    }
}