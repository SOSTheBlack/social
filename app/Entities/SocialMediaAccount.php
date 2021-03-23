<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class SocialMediaAccount.
 *
 * @package namespace App\Entities;
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
