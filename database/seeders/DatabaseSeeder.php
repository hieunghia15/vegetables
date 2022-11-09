<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UsersTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(DistrictsTableSeeder::class);
        $this->call(WardsTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(ModelHasRoleTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(RoleHasPermissionTableSeeder::class);
        $this->call(FarmersTableSeeder::class);
        $this->call(FarmProductTypeTableSeeder::class);
        $this->call(ScaleTableSeeder::class);
        $this->call(ExpressTableSeeder::class);
        $this->call(UnitTableSeeder::class);
        $this->call(PictureTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(TypeReportTableSeeder::class);
        $this->call(ReportTableSeeder::class);
    }
}
