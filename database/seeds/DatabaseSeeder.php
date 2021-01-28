<?php

use Database\Seeders\CreateRoleAndPermissionsTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(CreateRoleAndPermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
