<?php

namespace App\Repositories\Eloquent;

use App\Models\Cinema;
use App\Repositories\CinemaRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class CinemaRepository
 * @package App\Repositories\Eloquent
 */
class CinemaRepository implements CinemaRepositoryInterface
{
    /**
     * @return Cinema[]|Collection
     */
    public function all()
    {
        return Cinema::all();
    }
}
