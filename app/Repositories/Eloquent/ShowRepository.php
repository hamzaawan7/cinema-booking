<?php

namespace App\Repositories\Eloquent;

use App\Models\Show;
use App\Repositories\ShowRepositoryInterface;

/**
 * Class ShowRepository
 * @package App\Repositories\Eloquent
 */
class ShowRepository implements ShowRepositoryInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Show::where('theatre_id', $id)->with('film')->get();
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
