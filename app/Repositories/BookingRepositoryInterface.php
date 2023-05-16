<?php

namespace App\Repositories;

/**
 * Class BookingRepositoryInterface
 * @package App\Repositories
 */
interface BookingRepositoryInterface
{
    /**
     * @param $request
     * @return mixed
     */
    public function save($request);

    /**
     * @param $id
     * @return mixed
     */
    public function softDeleteBooking($id);
}
