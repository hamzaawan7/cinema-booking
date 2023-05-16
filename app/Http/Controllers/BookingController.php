<?php

namespace App\Http\Controllers;

use App\Services\CinemaBookingService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class BookingController
 * @package App\Http\Controllers
 */
class BookingController extends Controller
{
    /**
     * @var CinemaBookingService
     */
    private $cinemaBookingService;

    /**
     * @param CinemaBookingService $cinemaBookingService
     */
    public function __construct(CinemaBookingService $cinemaBookingService)
    {
        $this->cinemaBookingService = $cinemaBookingService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $cinemas = $this->cinemaBookingService->allCinemas();

        return view('index', compact('cinemas'));
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function getTheatres(int $id): JsonResponse
    {
        $theatres = $this->cinemaBookingService->findTheatre($id);

        return response()->json($theatres);
    }

    /**
     * @param int $id
     * @return Application|Factory|View
     */
    public function getShows(int $id)
    {
        $shows = $this->cinemaBookingService->findShow($id);
        $seatIds = $shows[0]->bookings->pluck('seat_id')->toArray();
        $seats = $this->cinemaBookingService->allSeats();

        return view('show', compact('shows', 'seats', 'seatIds'));
    }

    /**
     * @param Request $request
     * @return Application|Factory|View|RedirectResponse|void
     */
    public function cinemaBooking(Request $request)
    {
        if (Auth::check()) {
            if (isset($request->num_tickets)) {
                $this->cinemaBookingService->subtractShowTicket($request);
                $this->cinemaBookingService->saveBooking($request);

                return redirect()->route('dashboard')->with('message', 'Seats Booked Successfully');
            }
        } else {
            return view('auth.login');
        }
    }

    /**
     * @return Application|Factory|View
     */
    public function dashboard()
    {
        $user = auth()->user();

        return view('user_dashboard', compact('user'));
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function cancleBooking(int $id): RedirectResponse
    {
        $this->cinemaBookingService->cancleBooking($id);

        return back()->with('info', 'Booking Cancle Successfully');
    }
}
