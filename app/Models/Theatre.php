<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Theatre
 * @package App\Models
 * @property string name
 * @property integer max_seats
 */
class Theatre extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'max_seats',
    ];

    /**
     * @return BelongsTo
     */
    public function cinema(): BelongsTo
    {
        return $this->belongsTo(Cinema::class);
    }

    /**
     * @return HasMany
     */
    public function shows(): HasMany
    {
        return $this->hasMany(Show::class);
    }
}
