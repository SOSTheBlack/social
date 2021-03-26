<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * App\Entities\EnterpriseUser
 *
 * @property string $user_id
 * @property string $enterprise_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|EnterpriseUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EnterpriseUser newQuery()
 * @method static \Illuminate\Database\Query\Builder|EnterpriseUser onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|EnterpriseUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|EnterpriseUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EnterpriseUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EnterpriseUser whereEnterpriseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EnterpriseUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EnterpriseUser whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|EnterpriseUser withTrashed()
 * @method static \Illuminate\Database\Query\Builder|EnterpriseUser withoutTrashed()
 * @mixin \Eloquent
 */
class EnterpriseUser extends Pivot implements Transformable
{
    use TransformableTrait, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'enterprise_id'];

}
