<?php

namespace App\Repositories\Eloquent;

use App\Models\Show;
use App\Repositories\ShowRepositoryInterface;

/**
 * Class ShowRepository
 * @package App\Repositories\Eloquent
 */
class ShowRepository extends BaseRepository implements ShowRepositoryInterface
{
    /**
     * @param Show $model
     */
    public function __construct(Show $model)
    {
        parent::__construct($model);
    }

    /**
     * @param $request
     * @return mixed|void
     */
    public function SubtractShowTickets($request)
    {
        $show = Show::find($request->show_id);

        if ($show) {
            $decrementValue = count($request->num_tickets);
            $show->decrement('available_seats', $decrementValue);
            $show->save();

            return $show;
        }
    }
}
