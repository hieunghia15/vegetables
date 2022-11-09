<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RoleHasPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_has_permissions')->delete();

        DB::table('role_has_permissions')->insert(array(
            0 => array(
                'permission_id' => 6,
                'role_id' => 1
            ),
            1 => array(
                'permission_id' => 7,
                'role_id' => 1
            ),
            2 => array(
                'permission_id' => 10,
                'role_id' => 1
            ),
            3 => array(
                'permission_id' => 11,
                'role_id' => 1
            ),
            4 => array(
                'permission_id' => 12,
                'role_id' => 1
            ),
            5 => array(
                'permission_id' => 13,
                'role_id' => 1
            ),
            6 => array(
                'permission_id' => 14,
                'role_id' => 1
            ),
            7 => array(
                'permission_id' => 16,
                'role_id' => 1
            ),
            8 => array(
                'permission_id' => 19,
                'role_id' => 1
            ),
            9 => array(
                'permission_id' => 23,
                'role_id' => 1
            ),
            10 => array(
                'permission_id' => 28,
                'role_id' => 1
            ),
            11 => array(
                'permission_id' => 29,
                'role_id' => 1
            ),
            12 => array(
                'permission_id' => 34,
                'role_id' => 1
            ),
            13 => array(
                'permission_id' => 39,
                'role_id' => 1
            ),
            14 => array(
                'permission_id' => 44,
                'role_id' => 1
            ),
            15 => array(
                'permission_id' => 49,
                'role_id' => 1
            ),
            16 => array(
                'permission_id' => 52,
                'role_id' => 1
            ),
            17 => array(
                'permission_id' => 56,
                'role_id' => 1
            ),
            18 => array(
                'permission_id' => 61,
                'role_id' => 1
            ),
            19 => array(
                'permission_id' => 66,
                'role_id' => 1
            ),
            20 => array(
                'permission_id' => 67,
                'role_id' => 1
            ),
            21 => array(
                'permission_id' => 72,
                'role_id' => 1
            ),
            22 => array(
                'permission_id' => 77,
                'role_id' => 1
            ),
            23 => array(
                'permission_id' => 6,
                'role_id' => 2
            ),
            24 => array(
                'permission_id' => 10,
                'role_id' => 2
            ),
            25 => array(
                'permission_id' => 11,
                'role_id' => 2
            ),
            26 => array(
                'permission_id' => 14,
                'role_id' => 2
            ),
            27 => array(
                'permission_id' => 15,
                'role_id' => 2
            ),
            28 => array(
                'permission_id' => 19,
                'role_id' => 2
            ),
            29 => array(
                'permission_id' => 22,
                'role_id' => 2
            ),
            20 => array(
                'permission_id' => 23,
                'role_id' => 2
            ),
            31 => array(
                'permission_id' => 28,
                'role_id' => 2
            ),
            32 => array(
                'permission_id' => 29,
                'role_id' => 2
            ),
            33 => array(
                'permission_id' => 34,
                'role_id' => 2
            ),
            34 => array(
                'permission_id' => 39,
                'role_id' => 2
            ),
            35 => array(
                'permission_id' => 44,
                'role_id' => 2
            ),
            36 => array(
                'permission_id' => 49,
                'role_id' => 2
            ),
            37 => array(
                'permission_id' => 50,
                'role_id' => 2
            ),
            38 => array(
                'permission_id' => 51,
                'role_id' => 2
            ),
            39 => array(
                'permission_id' => 61,
                'role_id' => 2
            ),
            40 => array(
                'permission_id' => 66,
                'role_id' => 2
            ),
            41 => array(
                'permission_id' => 67,
                'role_id' => 2
            ),
            42 => array(
                'permission_id' => 72,
                'role_id' => 2
            ),
            43 => array(
                'permission_id' => 77,
                'role_id' => 2
            ),
            44 => array(
                'permission_id' => 3,
                'role_id' => 3
            ),
            45 => array(
                'permission_id' => 10,
                'role_id' => 3
            ),
            46 => array(
                'permission_id' => 11,
                'role_id' => 3
            ),
            47 => array(
                'permission_id' => 15,
                'role_id' => 3
            ),
            48 => array(
                'permission_id' => 19,
                'role_id' => 3
            ),
            49 => array(
                'permission_id' => 27,
                'role_id' => 3
            ),
            50 => array(
                'permission_id' => 34,
                'role_id' => 3
            ),
            51 => array(
                'permission_id' => 50,
                'role_id' => 3
            ),
            52 => array(
                'permission_id' => 51,
                'role_id' => 3
            ),
            53 => array(
                'permission_id' => 60,
                'role_id' => 3
            ),
            54 => array(
                'permission_id' => 64,
                'role_id' => 3
            ),
            55 => array(
                'permission_id' => 76,
                'role_id' => 3
            ),


        ));
    }
}