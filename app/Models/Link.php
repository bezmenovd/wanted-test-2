<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * @property int $id
 * @property string $slug
 * @property string $url
 * @property Carbon $expires_at
 * @property Carbon $created_at
 */
class Link extends Model
{
    protected $guarded = [
        'id',
    ];
}
