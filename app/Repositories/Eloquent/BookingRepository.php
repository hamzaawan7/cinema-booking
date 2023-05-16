<?php

namespace App\Repositories\Eloquent;

use App\Models\Booking;
use App\Repositories\BookingRepositoryInterface;

/**
 * Class BookingRepository
 * @package App\Repositories\Eloquent
 */
class BookingRepository extends BaseRepository implements BookingRepositoryInterface
{
    /**
     * @param Booking $model
     */
    public function __construct(Booking $model)
    {
        parent::__construct($model);
    }

    /**
     * @param $request
     * @return void
     */
    public function save($request)
    {
        foreach ($request->num_tickets as $tickets) {
            Booking::create([
                'user_id' => auth()->id(),
                'show_id' => $request->show_id,
                'seat_id' => $tickets,
                'num_tickets' => 1
            ]);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    function softDeleteBooking($id)
    {
        $booking = Booking::find($id);
        $seats = $booking->num_tickets;
        $booking->show()->increment('available_seats', $seats);
        $booking->delete();

        return $booking;
    }
}
