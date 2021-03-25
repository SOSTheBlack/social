<?php

namespace App\Entities;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * App\Entities\Enterprise
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string|null $document_type
 * @property int|null $document
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Enterprise newModelQuery()
 * @method static Builder|Enterprise newQuery()
 * @method static Builder|Enterprise query()
 * @method static Builder|Enterprise whereCreatedAt($value)
 * @method static Builder|Enterprise whereDocument($value)
 * @method static Builder|Enterprise whereDocumentType($value)
 * @method static Builder|Enterprise whereId($value)
 * @method static Builder|Enterprise whereName($value)
 * @method static Builder|Enterprise whereUpdatedAt($value)
 * @method static Builder|Enterprise whereUserId($value)
 * @mixin Eloquent
 */
class Enterprise extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

}
