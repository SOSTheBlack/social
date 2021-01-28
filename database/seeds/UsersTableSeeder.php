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
        $user = UserFactory::new(['name' => 'Jean C. Garcia', 'email' => 'jeancesargarcia@gmail.com'])->create();
        $user->givePermissionTo('super-admin');
    }
}
