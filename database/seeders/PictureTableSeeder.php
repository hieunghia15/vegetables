<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PictureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pictures')->delete();

        DB::table('pictures')->insert(array(
            0 =>
            array(
                'id' => 1,
                'url' => 'image/library/323ba7bc85ce6315cc44494f4230e67597.png',
                'product_id' => '1',
                'created_at' => '2022-03-19 01:49:28',
                'updated_at' => '2022-03-19 01:49:28'
            ),
            1 => array(
                'id' => 2,
                'url' => 'image/library/8ed9d687c031a2f1f91a08fa0a80a5bf12.png',
                'product_id' => '1',
                'created_at' => '2022-03-19 01:49:28',
                'updated_at' => '2022-03-19 01:49:28'
            ),
            2 => array(
                'id' => 3,
                'url' => 'image/library/72778dfe460dd5948c7aac3c46b7b38268.png',
                'product_id' => '1',
                'created_at' => '2022-03-19 01:49:28',
                'updated_at' => '2022-03-19 01:49:28'
            ),
            3 => array(
                'id' => 4,
                'url' => 'image/library/ca-chua-tui-500g-20210310224219654666.jpg',
                'product_id' => '1',
                'created_at' => '2022-03-19 01:49:28',
                'updated_at' => '2022-03-19 01:49:28'
            ),
            4 => array(
                'id' => 5,
                'url' => 'image/library/Nho xanh Ninh Thuận - 0264.png',
                'product_id' => '2',
                'created_at' => '2022-03-24 20:37:17',
                'updated_at' => '2022-03-24 20:37:17'
            ),
            5 => array(
                'id' => 6,
                'url' => 'image/library/Nho xanh Ninh Thuận - 0344.png',
                'product_id' => '2',
                'created_at' => '2022-03-24 20:37:17',
                'updated_at' => '2022-03-24 20:37:17'
            ),
            6 => array(
                'id' => 7,
                'url' => 'image/library/Bắp cải tròn Đà Lạt - 022.png',
                'product_id' => '3',
                'created_at' => '2022-03-31 00:54:32',
                'updated_at' => '2022-03-31 00:54:32'
            ),
            7 => array(
                'id' => 8,
                'url' => 'image/library/Bắp cải tròn Đà Lạt - 0322.png',
                'product_id' => '3',
                'created_at' => '2022-03-31 00:54:32',
                'updated_at' => '2022-03-31 00:54:32'
            ),
            8 => array(
                'id' => 9,
                'url' => 'image/library/Cà chua thân gỗ Đà Lạt - 0274.png',
                'product_id' => '4',
                'created_at' => '2022-03-31 00:55:55',
                'updated_at' => '2022-03-31 00:55:55'
            ),
            9 => array(
                'id' => 10,
                'url' => 'image/library/Cà chua thân gỗ Đà Lạt - 0396.png',
                'product_id' => '4',
                'created_at' => '2022-03-31 00:55:55',
                'updated_at' => '2022-03-31 00:55:55'
            ),
            10 => array(
                'id' => 11,
                'url' => 'image/library/Cà rốt Đà Lạt - 0221.png',
                'product_id' => '5',
                'created_at' => '2022-03-31 00:56:41',
                'updated_at' => '2022-03-31 00:56:41'
            ),
            11 => array(
                'id' => 12,
                'url' => 'image/library/Cà rốt Đà Lạt - 0331.png',
                'product_id' => '5',
                'created_at' => '2022-03-31 00:56:41',
                'updated_at' => '2022-03-31 00:56:41'
            ),
            12 => array(
                'id' => 13,
                'url' => 'image/library/Cải xoăn Ý - 0266.png',
                'product_id' => '6',
                'created_at' => '2022-03-31 00:57:28',
                'updated_at' => '2022-03-31 00:57:28'
            ),
            13 => array(
                'id' => 14,
                'url' => 'image/library/Cải xoăn Ý - 0333.png',
                'product_id' => '6',
                'created_at' => '2022-03-31 00:57:28',
                'updated_at' => '2022-03-31 00:57:28'
            ),
            14 => array(
                'id' => 15,
                'url' => 'image/library/Củ cải đỏ Đà Lạt - 0282.png',
                'product_id' => '7',
                'created_at' => '2022-03-31 00:58:20',
                'updated_at' => '2022-03-31 00:58:21'
            ),
            15 => array(
                'id' => 16,
                'url' => 'image/library/Củ cải đỏ Đà Lạt - 0360.png',
                'product_id' => '7',
                'created_at' => '2022-03-31 00:58:21',
                'updated_at' => '2022-03-31 00:58:21'
            ),
            16 => array(
                'id' => 17,
                'url' => 'image/library/Củ cải trắng - 0265.png',
                'product_id' => '8',
                'created_at' => '2022-03-31 00:59:02',
                'updated_at' => '2022-03-31 00:59:02'
            ),
            17 => array(
                'id' => 18,
                'url' => 'image/library/Củ cải trắng - 0387.png',
                'product_id' => '8',
                'created_at' => '2022-03-31 00:59:02',
                'updated_at' => '2022-03-31 00:59:02'
            ),
            18 => array(
                'id' => 19,
                'url' => 'image/library/Dưa leo baby - 0212.png',
                'product_id' => '9',
                'created_at' => '2022-03-31 01:01:01',
                'updated_at' => '2022-03-31 01:01:01'
            ),
            19 => array(
                'id' => 20,
                'url' => 'image/library/Dưa leo baby - 0370.png',
                'product_id' => '9',
                'created_at' => '2022-03-31 01:01:01',
                'updated_at' => '2022-03-31 01:01:01'
            ),
            20 => array(
                'id' => 21,
                'url' => 'image/library/Hành baro - 0226.png',
                'product_id' => '10',
                'created_at' => '2022-03-31 01:02:43',
                'updated_at' => '2022-03-31 01:02:43'
            ),
            21 => array(
                'id' => 22,
                'url' => 'image/library/Hành baro - 0356.png',
                'product_id' => '10',
                'created_at' => '2022-03-31 01:02:43',
                'updated_at' => '2022-03-31 01:02:43'
            ),
            22 => array(
                'id' => 23,
                'url' => 'image/library/Hành tây - 0237.png',
                'product_id' => '11',
                'created_at' => '2022-03-31 01:03:31',
                'updated_at' => '2022-03-31 01:03:31'
            ),
            23 => array(
                'id' => 24,
                'url' => 'image/library/Hành tây - 0327.png',
                'product_id' => '11',
                'created_at' => '2022-03-31 01:03:31',
                'updated_at' => '2022-03-31 01:03:31'
            ),
            24 => array(
                'id' => 25,
                'url' => 'image/library/Khoai lang mật Đà Lạt - 0288.png',
                'product_id' => '12',
                'created_at' => '2022-03-31 01:04:23',
                'updated_at' => '2022-03-31 01:04:23'
            ),
            25 => array(
                'id' => 26,
                'url' => 'image/library/Khoai lang mật Đà Lạt - 036.png',
                'product_id' => '12',
                'created_at' => '2022-03-31 01:04:23',
                'updated_at' => '2022-03-31 01:04:23'
            ),
            26 => array(
                'id' => 27,
                'url' => 'image/library/Khoai tây hồng Đà Lạt - 0222.png',
                'product_id' => '13',
                'created_at' => '2022-03-31 01:05:22',
                'updated_at' => '2022-03-31 01:05:22'
            ),
            27 => array(
                'id' => 28,
                'url' => 'image/library/Khoai tây hồng Đà Lạt - 0367.png',
                'product_id' => '13',
                'created_at' => '2022-03-31 01:05:22',
                'updated_at' => '2022-03-31 01:05:22'
            ),
            28 => array(
                'id' => 29,
                'url' => 'image/library/Ớt chuông - 0274.png',
                'product_id' => '14',
                'created_at' => '2022-03-31 01:06:25',
                'updated_at' => '2022-03-31 01:06:25'
            ),
            29 => array(
                'id' => 30,
                'url' => 'image/library/Ớt chuông - 0378.png',
                'product_id' => '14',
                'created_at' => '2022-03-31 01:06:25',
                'updated_at' => '2022-03-31 01:06:25'
            ),
            30 => array(
                'id' => 31,
                'url' => 'image/library/Tỏi cô đơn Lý Sơn - 0265.png',
                'product_id' => '15',
                'created_at' => '2022-03-31 01:07:15',
                'updated_at' => '2022-03-31 01:07:15'
            ),
            31 => array(
                'id' => 32,
                'url' => 'image/library/Tỏi cô đơn Lý Sơn - 0361.png',
                'product_id' => '15',
                'created_at' => '2022-03-31 01:07:15',
                'updated_at' => '2022-03-31 01:07:15'
            ),
            32 => array(
                'id' => 33,
                'url' => 'image/library/Xà lách Mỡ Đà Lạt - 0261.png',
                'product_id' => '16',
                'created_at' => '2022-03-31 01:07:53',
                'updated_at' => '2022-03-31 01:07:53'
            ),
            33 => array(
                'id' => 34,
                'url' => 'image/library/Xà lách Mỡ Đà Lạt - 0390.png',
                'product_id' => '16',
                'created_at' => '2022-03-31 01:07:53',
                'updated_at' => '2022-03-31 01:07:53'
            ),
            34 => array(
                'id' => 35,
                'url' => 'image/library/Cam Cao Phong - 0294.png',
                'product_id' => '17',
                'created_at' => '2022-03-31 01:10:45',
                'updated_at' => '2022-03-31 01:10:45'
            ),
            35 => array(
                'id' => 36,
                'url' => 'image/library/Cam Cao Phong - 0378.png',
                'product_id' => '17',
                'created_at' => '2022-03-31 01:10:45',
                'updated_at' => '2022-03-31 01:10:45'
            ),
            36 => array(
                'id' => 37,
                'url' => 'image/library/Đu đủ lùn ruột vàng - 0269.png',
                'product_id' => '18',
                'created_at' => '2022-03-31 01:11:38',
                'updated_at' => '2022-03-31 01:11:38'
            ),
            37 => array(
                'id' => 38,
                'url' => 'image/library/Đu đủ lùn ruột vàng - 034.png',
                'product_id' => '18',
                'created_at' => '2022-03-31 01:11:38',
                'updated_at' => '2022-03-31 01:11:38'
            ),
            38 => array(
                'id' => 39,
                'url' => 'image/library/Dưa lưới Taki - 0242.png',
                'product_id' => '19',
                'created_at' => '2022-03-31 01:12:20',
                'updated_at' => '2022-03-31 01:12:20'
            ),
            39 => array(
                'id' => 40,
                'url' => 'image/library/Dưa lưới Taki - 0325.png',
                'product_id' => '19',
                'created_at' => '2022-03-31 01:12:20',
                'updated_at' => '2022-03-31 01:12:20'
            ),
            40 => array(
                'id' => 41,
                'url' => 'image/library/Táo mèo Mộc Châu - 0223.png',
                'product_id' => '20',
                'created_at' => '2022-03-31 01:13:19',
                'updated_at' => '2022-03-31 01:13:19'
            ),
            41 => array(
                'id' => 42,
                'url' => 'image/library/Táo mèo Mộc Châu - 0322.png',
                'product_id' => '20',
                'created_at' => '2022-03-31 01:13:19',
                'updated_at' => '2022-03-31 01:13:19'
            ),
            42 => array(
                'id' => 43,
                'url' => 'image/library/buoi-da-xanh-meko-star1.jpg',
                'product_id' => '21',
                'created_at' => '2022-03-31 01:21:15',
                'updated_at' => '2022-03-31 01:21:15'
            ),
            43 => array(
                'id' => 44,
                'url' => 'image/library/cam-sanh-viet-nam-270.jpg',
                'product_id' => '22',
                'created_at' => '2022-03-31 01:25:31',
                'updated_at' => '2022-03-31 01:25:31'
            ),
            44 => array(
                'id' => 45,
                'url' => 'image/library/chuoi-gia-cavendish-321.jpg',
                'product_id' => '23',
                'created_at' => '2022-03-31 01:26:26',
                'updated_at' => '2022-03-31 01:26:26'
            ),
            45 => array(
                'id' => 46,
                'url' => 'image/library/chuoi-gia-cavendish-600x60065.png',
                'product_id' => '23',
                'created_at' => '2022-03-31 01:26:26',
                'updated_at' => '2022-03-31 01:26:26'
            ),
            46 => array(
                'id' => 47,
                'url' => 'image/library/dau-tuoi-da-lat7.png',
                'product_id' => '24',
                'created_at' => '2022-03-31 01:27:26',
                'updated_at' => '2022-03-31 01:27:26'
            ),
            47 => array(
                'id' => 48,
                'url' => 'image/library/dua-luoi-bao-khue-325.jpg',
                'product_id' => '25',
                'created_at' => '2022-03-31 01:28:15',
                'updated_at' => '2022-03-31 01:28:15'
            ),
            48 => array(
                'id' => 49,
                'url' => 'image/library/dua-luoi-bao-khue-600x60028.png',
                'product_id' => '25',
                'created_at' => '2022-03-31 01:28:15',
                'updated_at' => '2022-03-31 01:28:15'
            ),
            49 => array(
                'id' => 50,
                'url' => 'image/library/IMG_5878-768x51015.jpg',
                'product_id' => '26',
                'created_at' => '2022-03-31 01:30:02',
                'updated_at' => '2022-03-31 01:30:02'
            ),
            50 => array(
                'id' => 51,
                'url' => 'image/library/nho-do-ba-moi-2-768x57645.jpg',
                'product_id' => '27',
                'created_at' => '2022-03-31 01:30:35',
                'updated_at' => '2022-03-31 01:30:35'
            ),
            51 => array(
                'id' => 52,
                'url' => 'image/library/nho-do-ba-moi-768x57674.jpg',
                'product_id' => '27',
                'created_at' => '2022-03-31 01:30:35',
                'updated_at' => '2022-03-31 01:30:35'
            ),
            52 => array(
                'id' => 53,
                'url' => 'image/library/oi-le-my-loi-a46.jpg',
                'product_id' => '28',
                'created_at' => '2022-03-31 01:31:18',
                'updated_at' => '2022-03-31 01:31:18'
            ),
            53 => array(
                'id' => 54,
                'url' => 'image/library/tl1-1200x67659.jpg',
                'product_id' => '29',
                'created_at' => '2022-03-31 01:31:51',
                'updated_at' => '2022-03-31 01:31:51'
            ),
            54 => array(
                'id' => 55,
                'url' => 'image/library/xoai-cat-cao-lanh39.png',
                'product_id' => '30',
                'created_at' => '2022-03-31 01:32:33',
                'updated_at' => '2022-03-31 01:32:33'
            ),
            55 => array(
                'id' => 56,
                'url' => 'image/library/xoai-cat-cao-lanh-242.jpg',
                'product_id' => '30',
                'created_at' => '2022-03-31 01:32:33',
                'updated_at' => '2022-03-31 01:32:33'
            ),
            56 => array(
                'id'=>57,
                'url'=>'image/library/Xà lách Mỡ Đà Lạt - 0269.jpg',
                'product_id'=>'31',
                'created_at'=>'2022-04-05 14:01:44',
                'updated_at'=>'2022-04-05 14:01:44'
            ),
            57 => array(
                'id'=>58,
                'url'=>'image/library/Xà lách Mỡ Đà Lạt - 0384.jpg',
                'product_id'=>'31',
                'created_at'=>'2022-04-05 14:01:44',
                'updated_at'=>'2022-04-05 14:01:44'
            ),
            58 => array(
                'id'=>59,
                'url'=>'image/library/Cà rốt Đà Lạt - 0228.jpg',
                'product_id'=>'32',
                'created_at'=>'2022-04-05 14:13:35',
                'updated_at'=>'2022-04-05 14:13:35'
            ),
            59 => array(
                'id'=>60,
                'url'=>'image/library/Cà rốt Đà Lạt - 0320.jpg',
                'product_id'=>'32',
                'created_at'=>'2022-04-05 14:13:35',
                'updated_at'=>'2022-04-05 14:13:35'
            ),
            60 => array(
                'id'=>61,
                'url'=>'image/library/Củ cải trắng - 0234.jpg',
                'product_id'=>'33',
                'created_at'=>'2022-04-05 14:16:10',
                'updated_at'=>'2022-04-05 14:16:10'
            ),
            61 => array(
                'id'=>62,
                'url'=>'image/library/Củ cải trắng - 0387.jpg',
                'product_id'=>'33',
                'created_at'=>'2022-04-05 14:16:10',
                'updated_at'=>'2022-04-05 14:16:10'
            ),
            62 => array(
                'id'=>63,
                'url'=>'image/library/mong-toi-1-min238.jpg',
                'product_id'=>'34',
                'created_at'=>'2022-04-05 14:21:54',
                'updated_at'=>'2022-04-05 14:21:54'
            ),
            63 => array(
                'id'=>64,
                'url'=>'image/library/mong-toi-min145.jpg',
                'product_id'=>'34',
                'created_at'=>'2022-04-05 14:21:54',
                'updated_at'=>'2022-04-05 14:21:54'
            ),
            64 => array(
                'id'=>65,
                'url'=>'image/library/rau-hung-que262.jpg',
                'product_id'=>'35',
                'created_at'=>'2022-04-05 14:25:37',
                'updated_at'=>'2022-04-05 14:25:37'
            ),
            65 => array(
                'id'=>66,
                'url'=>'image/library/rau-hung-que479.jpg',
                'product_id'=>'35',
                'created_at'=>'2022-04-05 14:25:37',
                'updated_at'=>'2022-04-05 14:25:37'
            ),
            66 => array(
                'id'=>67,
                'url'=>'image/library/dua hau280.jpg',
                'product_id'=>'36',
                'created_at'=>'2022-04-05 14:32:57',
                'updated_at'=>'2022-04-05 14:32:57'
            ),
            67 => array(
                'id'=>68,
                'url'=>'image/library/dua-hau-38.jpg',
                'product_id'=>'36',
                'created_at'=>'2022-04-05 14:32:57',
                'updated_at'=>'2022-04-05 14:32:57'
            ),
            68 => array(
                'id'=>69,
                'url'=>'image/library/man225.jpg',
                'product_id'=>'37',
                'created_at'=>'2022-04-05 14:43:00',
                'updated_at'=>'2022-04-05 14:43:00'
            ),
            69 => array(
                'id'=>70,
                'url'=>'image/library/man312.jpg',
                'product_id'=>'37',
                'created_at'=>'2022-04-05 14:43:00',
                'updated_at'=>'2022-04-05 14:43:00'
            ),
            70 => array(
                'id'=>71,
                'url'=>'image/library/mit-to-nu-278.jpg',
                'product_id'=>'38',
                'created_at'=>'2022-04-05 14:46:36',
                'updated_at'=>'2022-04-05 14:46:36'
            ),
            71 => array(
                'id'=>72,
                'url'=>'image/library/mit-to-nu-369.jpg',
                'product_id'=>'38',
                'created_at'=>'2022-04-05 14:46:36',
                'updated_at'=>'2022-04-05 14:46:36'
            ),
            72 => array(
                'id'=>73,
                'url'=>'image/library/oi224.jpg',
                'product_id'=>'39',
                'created_at'=>'2022-04-05 14:49:25',
                'updated_at'=>'2022-04-05 14:49:25'
            ),
            73 => array(
                'id'=>74,
                'url'=>'image/library/oi330.jpg',
                'product_id'=>'39',
                'created_at'=>'2022-04-05 14:49:25',
                'updated_at'=>'2022-04-05 14:49:25'
            ),
            74 => array(
                'id'=>75,
                'url'=>'image/library/xoai-tu-quy25.jpg',
                'product_id'=>'40',
                'created_at'=>'2022-04-05 14:51:53',
                'updated_at'=>'2022-04-05 14:51:53'
            ),
            75 => array(
                'id'=>76,
                'url'=>'image/library/xoai-tu-quy348.jpg',
                'product_id'=>'40',
                'created_at'=>'2022-04-05 14:51:53',
                'updated_at'=>'2022-04-05 14:51:53'
            ),
            76 => array(
                'id'=>77,
                'url'=>'image/library/hat-dieu387.jpg',
                'product_id'=>'41',
                'created_at'=>'2022-04-05 15:06:00',
                'updated_at'=>'2022-04-05 15:06:00'
            ),
            77 => array(
                'id'=>78,
                'url'=>'image/library/hat-dieu1230.jpg',
                'product_id'=>'41',
                'created_at'=>'2022-04-05 15:06:00',
                'updated_at'=>'2022-04-05 15:06:00'
            ),
            78 => array(
                'id'=>79,
                'url'=>'image/library/hanh-nhan-rang-bo250.jpg',
                'product_id'=>'42',
                'created_at'=>'2022-04-05 15:08:37',
                'updated_at'=>'2022-04-05 15:08:37'
            ),
            79 => array(
                'id'=>80,
                'url'=>'image/library/hanh-nhan-rang-bo317.jpg',
                'product_id'=>'42',
                'created_at'=>'2022-04-05 15:08:37',
                'updated_at'=>'2022-04-05 15:08:37'
            ),
            80 => array(
                'id'=>81,
                'url'=>'image/library/huong-duong278.jpg',
                'product_id'=>'43',
                'created_at'=>'2022-04-05 15:13:20',
                'updated_at'=>'2022-04-05 15:13:20'
            ),
            81 => array(
                'id'=>82,
                'url'=>'image/library/huong-duong417.jpg',
                'product_id'=>'43',
                'created_at'=>'2022-04-05 15:13:20',
                'updated_at'=>'2022-04-05 15:13:20'
            ),
            82 => array(
                'id'=>83,
                'url'=>'image/library/Đậu xanh - 0146.jpg',
                'product_id'=>'44',
                'created_at'=>'2022-04-05 15:18:09',
                'updated_at'=>'2022-04-05 15:18:09'
            ),
            83 => array(
                'id'=>84,
                'url'=>'image/library/Đậu xanh - 0348.jpg',
                'product_id'=>'44',
                'created_at'=>'2022-04-05 15:18:09',
                'updated_at'=>'2022-04-05 15:18:09'
            ),
            84 => array(
                'id'=>85,
                'url'=>'image/library/dau xanh416.jpg',
                'product_id'=>'44',
                'created_at'=>'2022-04-05 15:18:09',
                'updated_at'=>'2022-04-05 15:18:09'
            ),
            85 => array(
                'id'=>86,
                'url'=>'image/library/Đậu nành tương - 0258.jpg',
                'product_id'=>'45',
                'created_at'=>'2022-04-05 15:20:09',
                'updated_at'=>'2022-04-05 15:20:09'
            ),
            86 => array(
                'id'=>87,
                'url'=>'image/library/Đậu nành tương - 0326.jpg',
                'product_id'=>'45',
                'created_at'=>'2022-04-05 15:20:09',
                'updated_at'=>'2022-04-05 15:20:09'
            ),
            87 => array(
                'id'=>88,
                'url'=>'image/library/kiwi166.jpg',
                'product_id'=>'46',
                'created_at'=>'2022-04-05 15:24:42',
                'updated_at'=>'2022-04-05 15:24:42'
            ),
            88 => array(
                'id'=>89,
                'url'=>'image/library/kiwi399.jpg',
                'product_id'=>'46',
                'created_at'=>'2022-04-05 15:24:42',
                'updated_at'=>'2022-04-05 15:24:42'
            ),
            89 => array(
                'id'=>90,
                'url'=>'image/library/nho-xanh286.jpg',
                'product_id'=>'47',
                'created_at'=>'2022-04-05 15:27:29',
                'updated_at'=>'2022-04-05 15:27:29'
            ),
            90 => array(
                'id'=>91,
                'url'=>'image/library/nho-xanh337.jpg',
                'product_id'=>'47',
                'created_at'=>'2022-04-05 15:27:29',
                'updated_at'=>'2022-04-05 15:27:29'
            ),
            91 => array(
                'id'=>92,
                'url'=>'image/library/tao do kho 337.jpg',
                'product_id'=>'48',
                'created_at'=>'2022-04-05 15:30:32',
                'updated_at'=>'2022-04-05 15:30:32'
            ),
            92 => array(
                'id'=>93,
                'url'=>'image/library/táo-đỏ-khô126.jpg',
                'product_id'=>'48',
                'created_at'=>'2022-04-05 15:30:32',
                'updated_at'=>'2022-04-05 15:30:32'
            ),
            93 => array(
                'id'=>94,
                'url'=>'image/library/cu-sen211.jpg',
                'product_id'=>'49',
                'created_at'=>'2022-04-05 15:34:28',
                'updated_at'=>'2022-04-05 15:34:28'
            ),
            94 => array(
                'id'=>95,
                'url'=>'image/library/cu-sen39.jpg',
                'product_id'=>'49',
                'created_at'=>'2022-04-05 15:34:28',
                'updated_at'=>'2022-04-05 15:34:28'
            ),
            95 => array(
                'id'=>96,
                'url'=>'image/library/xoài sấy192.jpg',
                'product_id'=>'50',
                'created_at'=>'2022-04-05 15:37:54',
                'updated_at'=>'2022-04-05 15:37:54'
            ),
            96 => array(
                'id'=>97,
                'url'=>'image/library/xoai say250.jpg',
                'product_id'=>'50',
                'created_at'=>'2022-04-05 15:37:54',
                'updated_at'=>'2022-04-05 15:37:54'
            ),
            97 => array(
                'id'=>98,
                'url'=>'image/library/so nau126.jpg',
                'product_id'=>'51',
                'created_at'=>'2022-04-06 12:10:33',
                'updated_at'=>'2022-04-06 12:10:33'
            ),
            98 => array(
                'id'=>99,
                'url'=>'image/library/so nau392.jpg',
                'product_id'=>'51',
                'created_at'=>'2022-04-06 12:10:33',
                'updated_at'=>'2022-04-06 12:10:33'
            ),
            99 => array(
                'id'=>100,
                'url'=>'image/library/bao ngu182.jpg',
                'product_id'=>'52',
                'created_at'=>'2022-04-06 12:13:56',
                'updated_at'=>'2022-04-06 12:13:56'
            ),
            100 => array(
                'id'=>101,
                'url'=>'image/library/bao ngu322.jpg',
                'product_id'=>'52',
                'created_at'=>'2022-04-06 12:13:56',
                'updated_at'=>'2022-04-06 12:13:56'
            ),
            101 => array(
                'id'=>102,
                'url'=>'image/library/dong co370.jpg',
                'product_id'=>'53',
                'created_at'=>'2022-04-06 12:16:49',
                'updated_at'=>'2022-04-06 12:16:49'
            ),
            102 => array(
                'id'=>103,
                'url'=>'image/library/dong-co135.jpg',
                'product_id'=>'53',
                'created_at'=>'2022-04-06 12:16:49',
                'updated_at'=>'2022-04-06 12:16:49'
            ),
            103 => array(
                'id'=>104,
                'url'=>'image/library/kim cham182.jpg',
                'product_id'=>'54',
                'created_at'=>'2022-04-06 12:42:55',
                'updated_at'=>'2022-04-06 12:42:55'
            ),
            104 => array(
                'id'=>105,
                'url'=>'image/library/kim cham313.jpg',
                'product_id'=>'54',
                'created_at'=>'2022-04-06 12:42:55',
                'updated_at'=>'2022-04-06 12:42:55'
            ),
            105 => array(
                'id'=>106,
                'url'=>'image/library/nam mo19.jpg',
                'product_id'=>'55',
                'created_at'=>'2022-04-06 12:47:28',
                'updated_at'=>'2022-04-06 12:47:28'
            ),
            106 => array(
                'id'=>107,
                'url'=>'image/library/nam mo392.jpg',
                'product_id'=>'55',
                'created_at'=>'2022-04-06 12:47:28',
                'updated_at'=>'2022-04-06 12:47:28'
            ),
            107 => array(
                'id'=>108,
                'url'=>'image/library/gao nep172.jpg',
                'product_id'=>'56',
                'created_at'=>'2022-04-06 12:51:45',
                'updated_at'=>'2022-04-06 12:51:45'
            ),
            108 => array(
                'id'=>109,
                'url'=>'image/library/gao nep252.jpg',
                'product_id'=>'56',
                'created_at'=>'2022-04-06 12:51:45',
                'updated_at'=>'2022-04-06 12:51:45'
            ),
            109 => array(
                'id'=>110,
                'url'=>'image/library/lai sua285.jpg',
                'product_id'=>'57',
                'created_at'=>'2022-04-06 12:54:55',
                'updated_at'=>'2022-04-06 12:54:55'
            ),
            110 => array(
                'id'=>111,
                'url'=>'image/library/lai sua342.jpg',
                'product_id'=>'57',
                'created_at'=>'2022-04-06 12:54:55',
                'updated_at'=>'2022-04-06 12:54:55'
            ),
            111 => array(
                'id'=>112,
                'url'=>'image/library/gao-thom-240.jpg',
                'product_id'=>'58',
                'created_at'=>'2022-04-06 13:01:09',
                'updated_at'=>'2022-04-06 13:01:09'
            ),
            112 => array(
                'id'=>113,
                'url'=>'image/library/gao-thom34.jpg',
                'product_id'=>'58',
                'created_at'=>'2022-04-06 13:01:09',
                'updated_at'=>'2022-04-06 13:01:09'
            ),
            113 => array(
                'id'=>114,
                'url'=>'image/library/gao-tam-thai52.jpg',
                'product_id'=>'59',
                'created_at'=>'2022-04-06 13:03:50',
                'updated_at'=>'2022-04-06 13:03:50'
            ),
            114 => array(
                'id'=>115,
                'url'=>'image/library/gao-tam-thai291.jpg',
                'product_id'=>'59',
                'created_at'=>'2022-04-06 13:03:50',
                'updated_at'=>'2022-04-06 13:03:50'
            ),
            115 => array(
                'id'=>116,
                'url'=>'image/library/gạo-Nhật-Bản-min16.jpg',
                'product_id'=>'60',
                'created_at'=>'2022-04-06 13:06:41',
                'updated_at'=>'2022-04-06 13:06:41'
            ),
            116 => array(
                'id'=>117,
                'url'=>'image/library/gao-nhat-min21.jpg',
                'product_id'=>'60',
                'created_at'=>'2022-04-06 13:06:41',
                'updated_at'=>'2022-04-06 13:06:41'
            ),
            117 => array(
                'id'=>118,
                'url'=>'image/library/mut tao248.jpg',
                'product_id'=>'61',
                'created_at'=>'2022-04-06 13:19:54',
                'updated_at'=>'2022-04-06 13:19:54'
            ),
            118 => array(
                    'id'=>119,
                    'url'=>'image/library/mut tao34.jpg',
                    'product_id'=>'61',
                    'created_at'=>'2022-04-06 13:19:54',
                    'updated_at'=>'2022-04-06 13:19:54'
            ),
            119 => array(
                'id'=>120,
                'url'=>'image/library/chuoi say136.jpg',
                'product_id'=>'62',
                'created_at'=>'2022-04-06 13:26:09',
                'updated_at'=>'2022-04-06 13:26:09'
            ),
            120 => array(
                'id'=>121,
                'url'=>'image/library/chuoi say388.jpg',
                'product_id'=>'62',
                'created_at'=>'2022-04-06 13:26:09',
                'updated_at'=>'2022-04-06 13:26:09'
            ),
            121 => array(
                'id'=>122,
                'url'=>'image/library/mit say253.jpg',
                'product_id'=>'63',
                'created_at'=>'2022-04-06 13:28:48',
                'updated_at'=>'2022-04-06 13:28:48'
            ),
            122 => array(
                'id'=>123,
                'url'=>'image/library/mit say322.jpg',
                'product_id'=>'63',
                'created_at'=>'2022-04-06 13:28:48',
                'updated_at'=>'2022-04-06 13:28:48'
            ),
            123 => array(
                'id'=>124,
                'url'=>'image/library/nhan say296.jpg',
                'product_id'=>'64',
                'created_at'=>'2022-04-06 13:32:32',
                'updated_at'=>'2022-04-06 13:32:32'
            ),
            124 => array(
                'id'=>125,
                'url'=>'image/library/nhan143.jpg',
                'product_id'=>'64',
                'created_at'=>'2022-04-06 13:32:32',
                'updated_at'=>'2022-04-06 13:32:32'
            ),
            125 => array(
                'id'=>126,
                'url'=>'image/library/vai say128.jpg',
                'product_id'=>'65',
                'created_at'=>'2022-04-06 13:49:31',
                'updated_at'=>'2022-04-06 13:49:31'
            ),
            126 => array(
                'id'=>127,
                'url'=>'image/library/vai say33.jpg',
                'product_id'=>'65',
                'created_at'=>'2022-04-06 13:49:31',
                'updated_at'=>'2022-04-06 13:49:31'
            ),
        ));
    }
}