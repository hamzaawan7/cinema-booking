<?php

namespace App\Repositories;

/**
 * Class ShowRepositoryInterface
 * @package App\Repositories
 */
interface ShowRepositoryInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @param $request
     * @return mixed
     */
    public function SubtractShowTickets($request);
}
