<?php

namespace Database\Seeders;

use Database\Factories\Entities\UserFactory;
use Illuminate\Database\Seeder;

/**
 * Class UsersTableSeeder
 *
 * @package Database\Seeders
 */
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $user = UserFactory::new()->create(['name' => 'Admin admin', 'email' => 'admin@admin.com']);
        $user->givePermissionTo('super-admin');
    }
}
