<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Enterprise newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Enterprise newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Enterprise query()
 * @method static \Illuminate\Database\Eloquent\Builder|Enterprise whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enterprise whereDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enterprise whereDocumentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enterprise whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enterprise whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enterprise whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enterprise whereUserId($value)
 * @mixin \Eloquent
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
