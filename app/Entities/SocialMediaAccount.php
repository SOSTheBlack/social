<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * App\Entities\SocialMediaAccount
 *
 * @property int $id
 * @property int $enterprise_id
 * @property int $social_media_id
 * @property int $ref_id
 * @property string|null $username
 * @property object $settings
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Entities\Enterprise|null $enterprise
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMediaAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMediaAccount newQuery()
 * @method static \Illuminate\Database\Query\Builder|SocialMediaAccount onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMediaAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMediaAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMediaAccount whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMediaAccount whereEnterpriseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMediaAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMediaAccount whereRefId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMediaAccount whereSettings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMediaAccount whereSocialMediaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMediaAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMediaAccount whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|SocialMediaAccount withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SocialMediaAccount withoutTrashed()
 * @mixin \Eloquent
 */
class SocialMediaAccount extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'enterprise_id',
        'social_media_id',
        'ref_id',
        'username',
        'settings'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'ref_id' => 'int',
        'settings' => 'object'
    ];

    /**
     * Define a one-to-one relationship.
     *
     * @return HasOne
     */
    public function enterprise(): HasOne
    {
        return $this->hasOne(Enterprise::class);
    }
}
