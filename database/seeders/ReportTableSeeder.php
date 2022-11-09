<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ReportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reports')->delete();

        DB::table('reports')->insert(array(
            0 =>
            array(
                'id'=>1,
                'farmer_id'=>'8',
                'type_report_id'=>'1',
                'messege'=>'Bán hàng kém chất lượng',
                'user_id'=>'2',
                'processing'=>'0',
                'created_at'=>'2022-05-16 14:23:48',
                'updated_at'=>'2022-05-16 14:23:48'
            ),
            1 =>
            array(
                'id'=>2,
                'farmer_id'=>'9',
                'type_report_id'=>'3',
                'messege'=>'Hàng được nhận không đúng',
                'user_id'=>'2',
                'processing'=>'0',
                'created_at'=>'2022-05-16 14:24:30',
                'updated_at'=>'2022-05-16 14:24:30'
            ),
            2 =>
            array(
                'id'=>3,
                'farmer_id'=>'6',
                'type_report_id'=>'5',
                'messege'=>'Nhà bán hàng hung hăn với khách',
                'user_id'=>'6',
                'processing'=>'0',
                'created_at'=>'2022-05-16 14:26:06',
                'updated_at'=>'2022-05-16 14:26:06'
            ),


            ));
    }
}
