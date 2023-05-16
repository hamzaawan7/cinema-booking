<?php

namespace App\Services;

use App\Repositories\BookingRepositoryInterface;
use App\Repositories\CinemaRepositoryInterface;
use App\Repositories\SeatRepositoryInterface;
use App\Repositories\ShowRepositoryInterface;
use App\Repositories\TheatreRepositoryInterface;

/**
 * Class CinemaBookingService
 * @package App\Services
 */
class CinemaBookingService
{
    /**
     * @var CinemaRepositoryInterface
     */
    private $cinemaRepository;

    /**
     * @var ShowRepositoryInterface
     */
    private $showRepository;

    /**
     * @var TheatreRepositoryInterface
     */
    private $theatreRepository;

    /**
     * @var BookingRepositoryInterface
     */
    private $bookingRepository;

    /**
     * @var SeatRepositoryInterface
     */
    private $seatRepository;

    /**
     * @param CinemaRepositoryInterface $cinemaRepository
     * @param ShowRepositoryInterface $showRepository
     * @param TheatreRepositoryInterface $theatreRepository
     * @param BookingRepositoryInterface $bookingRepository
     * @param SeatRepositoryInterface $seatRepository
     */
    public function __construct(
        CinemaRepositoryInterface  $cinemaRepository,
        ShowRepositoryInterface    $showRepository,
        TheatreRepositoryInterface $theatreRepository,
        BookingRepositoryInterface $bookingRepository,
        SeatRepositoryInterface    $seatRepository
    )
    {
        $this->cinemaRepository = $cinemaRepository;
        $this->showRepository = $showRepository;
        $this->theatreRepository = $theatreRepository;
        $this->bookingRepository = $bookingRepository;
        $this->seatRepository = $seatRepository;
    }

    /**
     * @return mixed
     */
    public function allCinemas()
    {
        return $this->cinemaRepository->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findTheatre($id)
    {
        return $this->theatreRepository->allWhere(['*'], ['cinema_id' => $id]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findShow($id)
    {
        return $this->showRepository->allWhere(['*'], ['theatre_id' => $id],['film']);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function saveBooking($request)
    {
        return $this->bookingRepository->save($request);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function subtractShowTicket($request)
    {
        return $this->showRepository->SubtractShowTickets($request);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function cancleBooking($id)
    {
        return $this->bookingRepository->softDeleteBooking($id);
    }

    /**
     * @return mixed
     */
    public function allSeats()
    {
        return $this->seatRepository->all();
    }
}
