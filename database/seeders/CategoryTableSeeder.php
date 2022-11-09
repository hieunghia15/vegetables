<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->delete();
        DB::table('categories')->insert(array(
            0 =>
            array(
                'id'=>1,
                'name'=>'Mẹo vặt',
                'thumbnail'=>'image/post\\tiet-kiem-khi-di-cho156.jpg',
                'category_slug'=>'meo-vat',
                'is_actived'=>'1',
                'farmer_id'=>NULL,
                'deleted_at'=>NULL,
                'created_at'=>'2022-04-17 10:16:58',
                'updated_at'=>'2022-04-17 10:16:58'
            ),
            1 =>
            array(
                'id'=>2,
                'name'=>'Rau sạch',
                'thumbnail'=>'image/post\\rau-sach-dalat0.jpg',
                'category_slug'=>'rau-sach',
                'is_actived'=>'1',
                'farmer_id'=>NULL,
                'deleted_at'=>NULL,
                'created_at'=>'2022-04-17 10:18:09',
                'updated_at'=>'2022-04-17 10:18:09'
            ),
            2 =>
            array(
                'id'=>3,
                'name'=>'Món ngon',
                'thumbnail'=>'image/post\\monngon76.jpg',
                'category_slug'=>'mon-ngon',
                'is_actived'=>'1',
                'farmer_id'=>'3',
                'deleted_at'=>NULL,
                'created_at'=>'2022-04-17 10:18:55',
                'updated_at'=>'2022-04-17 10:18:55'
            ),
            3 =>
            array(
                'id'=>4,
                'name'=>'Kỹ thuật trồng trọt',
                'thumbnail'=>'image/post\\trongtrot34.jpg',
                'category_slug'=>'ky-thuat-trong-trot',
                'is_actived'=>'1',
                'farmer_id'=>'3',
                'deleted_at'=>NULL,
                'created_at'=>'2022-04-17 10:25:06',
                'updated_at'=>'2022-04-17 10:25:06'
            ),
            4 =>
            array(
                'id'=>5,
                'name'=>'Món ăn',
                'thumbnail'=>'image/post\\mon an35.jpg',
                'category_slug'=>'mon-an',
                'is_actived'=>'1',
                'farmer_id'=>NULL,
                'deleted_at'=>NULL,
                'created_at'=>'2022-04-17 13:52:47',
                'updated_at'=>'2022-04-17 13:52:47'
            ),
            5 =>
            array(
                'id'=>6,
                'name'=>'Bảo quản',
                'thumbnail'=>'image/post\\bảo quản79.jpg',
                'category_slug'=>'bao-quan',
                'is_actived'=>'1',
                'farmer_id'=>'3',
                'deleted_at'=>NULL,
                'created_at'=>'2022-04-17 14:59:18',
                'updated_at'=>'2022-04-17 14:59:18'
            ),
            6 =>
            array(
                'id'=>7,
                'name'=>'Phòng bệnh',
                'thumbnail'=>'image/post\\saubenh31.jpg',
                'category_slug'=>'phong-benh',
                'is_actived'=>'1',
                'farmer_id'=>'5',
                'deleted_at'=>NULL,
                'created_at'=>'2022-04-17 15:13:15',
                'updated_at'=>'2022-04-17 15:13:15'
            ),
            7 =>
            array(
                'id'=>8,
                'name'=>'Trái cây',
                'thumbnail'=>'image/post\\trai cay26.jpg',
                'category_slug'=>'trai-cay',
                'is_actived'=>'1',
                'farmer_id'=>'5',
                'deleted_at'=>NULL,
                'created_at'=>'2022-04-17 15:14:46',
                'updated_at'=>'2022-04-17 15:14:46'
            ),
            8 =>
            array(
                'id'=>9,
                'name'=>'Rau, củ',
                'thumbnail'=>'image/post\\rau-cu-qua-sach78.jpg',
                'category_slug'=>'rau-cu',
                'is_actived'=>'1',
                'farmer_id'=>'6',
                'deleted_at'=>NULL,
                'created_at'=>'2022-04-17 15:26:00',
                'updated_at'=>'2022-04-17 15:26:00'
            ),
            9 =>
            array(
                'id'=>10,
                'name'=>'Trái cây',
                'thumbnail'=>'image/post\\danhmuckhac79.jpg',
                'category_slug'=>'trai-cay',
                'is_actived'=>'1',
                'farmer_id'=>'6',
                'deleted_at'=>NULL,
                'created_at'=>'2022-04-17 15:26:17',
                'updated_at'=>'2022-04-17 15:26:17'
            ),
        ));
    }
}
