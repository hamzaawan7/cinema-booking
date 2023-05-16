<?php

namespace App\Repositories;

/**
 * Class TheatreRepositoryInterface
 * @package App\Repositories
 */
interface TheatreRepositoryInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function find($id);
}
