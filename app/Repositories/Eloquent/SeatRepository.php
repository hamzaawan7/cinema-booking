<?php

namespace App\Repositories\Eloquent;

use App\Models\Seat;
use App\Repositories\SeatRepositoryInterface;

/**
 * Class SeatRepository
 * @package App\Repositories\Eloquent
 */
class SeatRepository extends BaseRepository implements SeatRepositoryInterface
{
    /**
     * @param Seat $model
     */
    public function __construct(Seat $model)
    {
        parent::__construct($model);
    }
}
