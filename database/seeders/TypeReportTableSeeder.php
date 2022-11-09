<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TypeReportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_reports')->delete();

        DB::table('type_reports')->insert(array(
            0 =>
            array(
                'id'=>1,
                'name'=>'Bán hàng kém chất lượng',
                'created_at'=>'2022-05-15 15:42:33',
                'updated_at'=>'2022-05-15 15:42:33'
            ),
            1 =>
            array(
                'id'=>2,
                'name'=>'Bán phá giá',
                'created_at'=>'2022-05-15 15:42:41',
                'updated_at'=>'2022-05-15 15:42:41'
            ),
            2 =>
            array(
                'id'=>3,
                'name'=>'Bán sai nông sản',
                'created_at'=>'2022-05-15 15:42:51',
                'updated_at'=>'2022-05-15 15:42:51'
            ),
            3 =>
            array(
                'id'=>4,
                'name'=>'Gian hàng đề cập đến việc thực hiện giao dịch bên ngoài nền tảng NongSanViet',
                'created_at'=>'2022-05-15 15:43:44',
                'updated_at'=>'2022-05-15 15:43:44'
            ),
            4 =>
            array(
                'id'=>5,
                'name'=>'Nhà bán hàng hung hăng/ thô lỗ',
                'created_at'=>'2022-05-15 15:44:36',
                'updated_at'=>'2022-05-15 15:44:36'
            ),

            ));
    }
}
