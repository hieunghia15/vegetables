<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class FarmersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('farmers')->delete();

        DB::table('farmers')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'Nông sản Thành Đạt',
                'avatar' => 'image/farmer/thanhdat265.jpg',
                'tax_code' => '213124985315',
                'user_id' => '3',
                'created_at' => '2022-03-24 19:59:50',
                'updated_at' => '2022-03-24 19:59:50'
            ),
            1 => array(
                'id' => 2,
                'name' => 'Nông sản Đại Phát',
                'avatar' => 'image/farmer/dp9.jpg',
                'tax_code' => '325623465346',
                'user_id' => '4',
                'created_at' => '2022-03-24 20:00:54',
                'updated_at' => '2022-03-24 20:00:54'
            ),
            2 => array(
                'id' => 3,
                'name' => 'Nông sản Việt',
                'avatar' => 'image/farmer/lê hải hồbn18.jpg',
                'tax_code' => '325625555346',
                'user_id' => '16',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            3 => array(
                'id' => 4,
                'name' => 'Nông sản Siêu sạch',
                'avatar' => 'image/farmer/lethimuoi15.jpg',
                'tax_code' => '325321555346',
                'user_id' => '17',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            4 => array(
                'id' => 5,
                'name' => 'Nông sản Siêu sạch',
                'avatar' => 'image/farmer/levancam86.jpg',
                'tax_code' => '986321555346',
                'user_id' => '18',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            5 => array(
                'id' => 6,
                'name' => 'Nông sản 3 miền',
                'avatar' => 'image/farmer/luongvancua26.jpg',
                'tax_code' => '986321555858',
                'user_id' => '19',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            6 => array(
                'id' => 7,
                'name' => 'Nông sản 7 Quới',
                'avatar' => 'image/farmer/ngothanhquoi50.jpg',
                'tax_code' => '986326675858',
                'user_id' => '20',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            7 => array(
                'id' => 8,
                'name' => 'Nông sản 4 Hải',
                'avatar' => 'image/farmer/ngovanhai47.jpg',
                'tax_code' => '986999675858',
                'user_id' => '21',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            8 => array(
                'id' => 9,
                'name' => 'Nông sản Thịnh Phát 3',
                'avatar' => 'image/farmer/nguyenvando35.jpg',
                'tax_code' => '986999675333',
                'user_id' => '22',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            9 => array(
                'id' => 10,
                'name' => 'Nông sản Ngọc Thịnh',
                'avatar' => 'image/farmer/qangvinh40.jpg',
                'tax_code' => '636999675333',
                'user_id' => '23',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            10 => array(
                'id' => 11,
                'name' => 'Nông sản Ngọc Thịnh',
                'avatar' => 'image/farmer/hngphung20.jpg',
                'tax_code' => '636944575333',
                'user_id' => '24',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            11 => array(
                'id' => 12,
                'name' => 'Nông sản Trần Dần',
                'avatar' => 'image/farmer/ttdung14.jpg',
                'tax_code' => '936944576356',
                'user_id' => '25',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
        ));
    }
}
