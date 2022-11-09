<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class FarmProductTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('farm_product_types')->delete();

        DB::table('farm_product_types')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'Rau củ',
                'product_type_slug' => 'rau-cu',
                'thumbnail' => 'public/upload/rau.png',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'Trái cây',
                'product_type_slug' => 'trai-cay',
                'thumbnail' => 'public/upload/trai.png',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'Đồ khô',
                'product_type_slug' => 'do-kho',
                'thumbnail' => 'public/upload/tra.jpg',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            3 =>
            array(
                'id' => 4,
                'name' => 'Hạt',
                'product_type_slug' => 'hat',
                'thumbnail' => 'public/upload/hat.png',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            4 =>
            array(
                'id' => 5,
                'name' => 'Nấm',
                'product_type_slug' => 'nam',
                'thumbnail' => 'public/upload/nam.jpg',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            5 =>
            array(
                'id' => 6,
                'name' => 'Gạo',
                'product_type_slug' => 'gao',
                'thumbnail' => 'public/upload/gao.jpg',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            6 =>
            array(
                'id' => 7,
                'name' => 'Nông sản khác',
                'product_type_slug' => 'nong-san-khac',
                'thumbnail' => 'public/upload/banner-0357.png',
                'created_at' => NULL,
                'updated_at' => NULL
            ),


        ));
    }
}