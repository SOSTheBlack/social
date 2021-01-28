<?php

namespace Database\Seeders;

use App\Entities\Permission;
use Illuminate\Database\Seeder;

/**
 * Class CreateRoleAndPermissionsTableSeeder
 *
 * @package Database\Seeders
 */
class CreateRoleAndPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'super-admin']);
        Permission::create(['name' => 'free_trial']);
        Permission::create(['name' => 'payer']);
    }
}
