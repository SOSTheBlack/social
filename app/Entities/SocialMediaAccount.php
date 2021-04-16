<?php

namespace App\Entities;

use Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * App\Entities\SocialMediaAccount
 *
 * @property string $id
 * @property string $enterprise_id
 * @property string $social_media_id
 * @property int $ref_id
 * @property string|null $username
 * @property object $settings
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Enterprise|null $enterprise
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMediaAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMediaAccount newQuery()
 * @method static Builder|SocialMediaAccount onlyTrashed()
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
 * @method static Builder|SocialMediaAccount withTrashed()
 * @method static Builder|SocialMediaAccount withoutTrashed()
 * @mixin Eloquent
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
        'settings',
        'synced'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'ref_id' => 'int',
        'settings' => 'object',
        'data' => 'object'
    ];

    /**
     * Define a one-to-one relationship.
     *
     * @return BelongsTo
     */
    public function enterprise(): BelongsTo
    {
        return $this->belongsTo(Enterprise::class);
    }

    public function social_media()
    {
        return $this->belongsTo(SocialMedia::class);
    }

}
