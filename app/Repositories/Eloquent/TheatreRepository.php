<?php

namespace App\Repositories\Eloquent;

use App\Models\Theatre;
use App\Repositories\TheatreRepositoryInterface;

/**
 * Class TheatreRepository
 * @package App\Repositories\Eloquent
 */
class TheatreRepository extends BaseRepository implements TheatreRepositoryInterface
{
    /**
     * @param Theatre $model
     */
    public function __construct(Theatre $model)
    {
        parent::__construct($model);
    }
}
