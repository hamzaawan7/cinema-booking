<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Film
 * @package App\Models
 * @property string title
 * @property string description
 */
class Film extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description'
    ];

    /**
     * @return BelongsToMany
     */
    public function cinemas(): BelongsToMany
    {
        return $this->belongsToMany(Cinema::class);
    }

    /**
     * @return HasMany
     */
    public function shows(): HasMany
    {
        return $this->hasMany(Show::class);
    }
}
