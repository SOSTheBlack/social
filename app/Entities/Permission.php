<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Contracts\Permission as PermissionContract;
use Spatie\Permission\Models\Permission as BasePermission;

/**
 * Class Permission
 *
 * @package App\Entities
 */
class Permission extends BasePermission implements PermissionContract
{
    use HasFactory;
}
