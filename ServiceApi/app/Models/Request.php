<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create($toArray)
 * @method static where(string $string, $requestId)
 */
class Request extends Model
{
    protected $fillable = ['user_id', 'reason', 'status'];
    use HasFactory;

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
