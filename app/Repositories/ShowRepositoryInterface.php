<?php

namespace App\Repositories;

/**
 * Class ShowRepositoryInterface
 * @package App\Repositories
 */
interface ShowRepositoryInterface
{
    /**
     * @param $request
     * @return mixed
     */
    public function SubtractShowTickets($request);
}
