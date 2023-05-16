<?php

namespace App\Repositories\Eloquent;

use App\Models\Theatre;
use App\Repositories\TheatreRepositoryInterface;

/**
 * Class TheatreRepository
 * @package App\Repositories\Eloquent
 */
class TheatreRepository implements TheatreRepositoryInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Theatre::where('cinema_id', $id)->get();
    }
}
