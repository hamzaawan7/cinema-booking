<?php

namespace App\Repositories\Eloquent;

use App\Models\Cinema;
use App\Repositories\CinemaRepositoryInterface;

/**
 * Class CinemaRepository
 * @package App\Repositories\Eloquent
 */
class CinemaRepository extends BaseRepository implements CinemaRepositoryInterface
{
    /**
     * @param Cinema $model
     */
    public function __construct(Cinema $model)
    {
        parent::__construct($model);
    }
}
