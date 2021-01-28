<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Contracts\Role as RoleContract;
use Spatie\Permission\Models\Role as BaseRole;

/**
 * Class Role
 *
 * @package App\Entities
 */
class Role extends BaseRole implements RoleContract
{
    use HasFactory;
}
