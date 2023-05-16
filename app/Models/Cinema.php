<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Cinema
 * @package App\Models
 * @property string name
 * @property string location
 */
class Cinema extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'location'
    ];

    /**
     * @return HasMany
     */
    public function theatres(): HasMany
    {
        return $this->hasMany(Theatre::class);
    }

    /**
     * @return BelongsToMany
     */
    public function films(): BelongsToMany
    {
        return $this->belongsToMany(Film::class);
    }

}
