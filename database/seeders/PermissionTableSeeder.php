<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();

        DB::table('permissions')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'post.create',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'post.delete',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'post.view',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            3 =>
            array(
                'id' => 4,
                'name' => 'post.add',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            4 =>
            array(
                'id' => 5,
                'name' => 'post.update',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            5 =>
            array(
                'id' => 6,
                'name' => 'post.*',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            6 =>
            array(
                'id' => 7,
                'name' => 'approve-post',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            7 =>
            array(
                'id' => 8,
                'name' => 'account.view',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            8 =>
            array(
                'id' => 9,
                'name' => 'account.update',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            9 =>
            array(
                'id' => 10,
                'name' => 'account.*',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            10 =>
            array(
                'id' => 11,
                'name' => 'change-password',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            11 =>
            array(
                'id' => 12,
                'name' => 'lock-account',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            12 =>
            array(
                'id' => 13,
                'name' => 'assign',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            13 =>
            array(
                'id' => 14,
                'name' => 'statistic',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            14 =>
            array(
                'id' => 15,
                'name' => 'order-form.view',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            15 =>
            array(
                'id' => 16,
                'name' => 'approve-farm-produce',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            16 =>
            array(
                'id' => 17,
                'name' => 'farm-produce.update',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            17 =>
            array(
                'id' => 18,
                'name' => 'farm-produce.add',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            18 =>
            array(
                'id' => 19,
                'name' => 'farm-produce.view',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            19 =>
            array(
                'id' => 20,
                'name' => 'farm-produce.lock',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            20 =>
            array(
                'id' => 21,
                'name' => 'farm-produce.delete',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            21 =>
            array(
                'id' => 22,
                'name' => 'farm-produce.*',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            22 =>
            array(
                'id' => 23,
                'name' => 'order-status.update',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            23 =>
            array(
                'id' => 24,
                'name' => 'farm-produce-type.update',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            24 =>
            array(
                'id' => 25,
                'name' => 'farm-produce-type.add',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            25 =>
            array(
                'id' => 26,
                'name' => 'farm-produce-type.delete',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            26 =>
            array(
                'id' => 27,
                'name' => 'farm-produce-type.view',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            27 =>
            array(
                'id' => 28,
                'name' => 'farm-produce-type.*',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            28 =>
            array(
                'id' => 29,
                'name' => 'warehouse.update',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            29 =>
            array(
                'id' => 30,
                'name' => 'comment.add',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            30 =>
            array(
                'id' => 31,
                'name' => 'comment.update',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            31 =>
            array(
                'id' => 32,
                'name' => 'comment.delete',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            32 =>
            array(
                'id' => 33,
                'name' => 'comment.view',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            33 =>
            array(
                'id' => 34,
                'name' => 'comment.*',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            34 =>
            array(
                'id' => 35,
                'name' => 'weight.add',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            35 =>
            array(
                'id' => 36,
                'name' => 'weight.delete',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            36 =>
            array(
                'id' => 37,
                'name' => 'weight.view',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            37 =>
            array(
                'id' => 38,
                'name' => 'weight.update',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            38 =>
            array(
                'id' => 39,
                'name' => 'weight.*',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            39 =>
            array(
                'id' => 40,
                'name' => 'unit.add',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            40 =>
            array(
                'id' => 41,
                'name' => 'unit.update',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            41 =>
            array(
                'id' => 42,
                'name' => 'unit.delete',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            42 =>
            array(
                'id' => 43,
                'name' => 'unit.view',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            43 =>
            array(
                'id' => 44,
                'name' => 'unit.*',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            44 =>
            array(
                'id' => 45,
                'name' => 'scale.add',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            45 =>
            array(
                'id' => 46,
                'name' => 'scale.update',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            46 =>
            array(
                'id' => 47,
                'name' => 'scale.view',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            47 =>
            array(
                'id' => 48,
                'name' => 'scale.delete',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            48 =>
            array(
                'id' => 49,
                'name' => 'scale.*',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            49 =>
            array(
                'id' => 50,
                'name' => 'order',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            50 => array(
                'id' => 51,
                'name' => 'contract.confirm',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            51 => array(
                'id' => 52,
                'name' => 'location',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            52 => array(
                'id' => 53,
                'name' => 'farmer.view',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            53 => array(
                'id' => 54,
                'name' => 'farmer.add',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            54 => array(
                'id' => 55,
                'name' => 'farmer.lock',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            55 => array(
                'id' => 56,
                'name' => 'farmer.*',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            56 => array(
                'id' => 57,
                'name' => 'category.add',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            57 => array(
                'id' => 58,
                'name' => 'category.update',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            58 => array(
                'id' => 59,
                'name' => 'category.lock',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            59 => array(
                'id' => 60,
                'name' => 'category.view',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            60 => array(
                'id' => 61,
                'name' => 'category.*',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            61 => array(
                'id' => 62,
                'name' => 'service.add',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            62 => array(
                'id' => 63,
                'name' => 'service.update',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            63 => array(
                'id' => 64,
                'name' => 'service.view',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            64 => array(
                'id' => 65,
                'name' => 'service.delete',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            65 => array(
                'id' => 66,
                'name' => 'service.*',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            66 => array(
                'id' => 67,
                'name' => 'status',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            67 => array(
                'id' => 68,
                'name' => 'picture.add',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            68 => array(
                'id' => 69,
                'name' => 'picture.update',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            69 => array(
                'id' => 70,
                'name' => 'picture.delete',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            70 => array(
                'id' => 71,
                'name' => 'picture.view',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            71 => array(
                'id' => 72,
                'name' => 'picture.*',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            72 => array(
                'id' => 73,
                'name' => 'express.add',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            73 => array(
                'id' => 74,
                'name' => 'express.update',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            74 => array(
                'id' => 75,
                'name' => 'express.delete',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            75 => array(
                'id' => 76,
                'name' => 'express.view',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),
            76 => array(
                'id' => 77,
                'name' => 'express.*',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL
            ),

        ));
    }
}