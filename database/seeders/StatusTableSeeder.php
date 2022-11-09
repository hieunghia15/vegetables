<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('statuses')->delete();

        DB::table('statuses')->insert(array(
            0 =>
            array(
                'id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'name' => 'Chờ xác nhận'
                
            ),
            1 =>
            array(
                'id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
                'name' => 'Đang lấy hàng'
            ),
            2 =>
            array(
                'id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
                'name' => 'Đang giao'
            ),
            3 =>
            array(
                'id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
                'name' => 'Đã hủy'
            ),
            4 =>
            array(
                'id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
                'name' => 'Giao hàng thành công'
            ),
            5 =>
            array(
                'id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
                'name' => 'Chờ xác nhận hủy'
            )
            ));
    }
}
