<?php

namespace App\Entities;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * App\Entities\Enterprise
 *
 * @property string $id
 * @property string $name
 * @property string|null $document_type
 * @property int|null $document
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection|Enterprise[] $users
 * @property-read int|null $users_count
 * @method static Builder|Enterprise newModelQuery()
 * @method static Builder|Enterprise newQuery()
 * @method static \Illuminate\Database\Query\Builder|Enterprise onlyTrashed()
 * @method static Builder|Enterprise query()
 * @method static Builder|Enterprise whereCreatedAt($value)
 * @method static Builder|Enterprise whereDeletedAt($value)
 * @method static Builder|Enterprise whereDocument($value)
 * @method static Builder|Enterprise whereDocumentType($value)
 * @method static Builder|Enterprise whereId($value)
 * @method static Builder|Enterprise whereName($value)
 * @method static Builder|Enterprise whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Enterprise withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Enterprise withoutTrashed()
 * @mixin Eloquent
 */
class Enterprise extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Define a many-to-many relationship
     *
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->using(EnterpriseUser::class);
    }

    /**
     * Define a one-to-many relationship.
     *
     * @return HasMany
     */
    public function social_media_accounts(): HasMany
    {
        return $this->hasMany(SocialMediaAccount::class);
    }

    public static function listSocialMediaAccounts()
    {
        $socialMediaAccounts = collect();

        /** It brings together in a single list the integrated social networks of all companies that the user is allowed. */
        user(['enterprises.social_media_accounts'])->enterprises
            ->pluck('social_media_accounts.*', 'id')
            ->filter(fn (array $listAccountsOfEnterprise) => ! empty($listAccountsOfEnterprise))
            ->each(fn (array $listAccountsOfEnterprise) => $socialMediaAccounts->push(... $listAccountsOfEnterprise));

        return $socialMediaAccounts;
    }
}
