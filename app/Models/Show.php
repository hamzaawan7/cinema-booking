<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Show
 * @package App\Models
 * @property integer theatre_id
 * @property integer film_id
 * @property integer available_seats
 * @property string show_time
 */
class Show extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'theatre_id',
        'film_id',
        'available_seats',
        'show_time',
    ];

    /**
     * @return BelongsTo
     */
    public function film(): BelongsTo
    {
        return $this->belongsTo(Film::class);
    }

    /**
     * @return BelongsTo
     */
    public function theatre(): BelongsTo
    {
        return $this->belongsTo(Theatre::class);
    }

    /**
     * @return HasMany
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
