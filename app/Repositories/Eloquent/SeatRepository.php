<?php

namespace App\Repositories\Eloquent;

use App\Models\Seat;
use App\Repositories\SeatRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class SeatRepository
 * @package App\Repositories\Eloquent
 */
class SeatRepository implements SeatRepositoryInterface
{
    /**
     * @return Collection|Seat[]
     */
    public function all()
    {
        return Seat::all();
    }
}
