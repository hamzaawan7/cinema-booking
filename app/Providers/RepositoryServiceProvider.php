<?php

namespace App\Providers;

use App\Repositories\BookingRepositoryInterface;
use App\Repositories\Eloquent\BookingRepository;
use App\Repositories\Eloquent\SeatRepository;
use App\Repositories\SeatRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CinemaRepositoryInterface;
use App\Repositories\Eloquent\CinemaRepository;
use App\Repositories\Eloquent\ShowRepository;
use App\Repositories\Eloquent\TheatreRepository;
use App\Repositories\ShowRepositoryInterface;
use App\Repositories\TheatreRepositoryInterface;

/**
 * Class RepositoryServiceProvider
 * @package App\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     * @return void
     */
    public function register()
    {
        $this->app->bind(CinemaRepositoryInterface::class, CinemaRepository::class);
        $this->app->bind(TheatreRepositoryInterface::class, TheatreRepository::class);
        $this->app->bind(ShowRepositoryInterface::class, ShowRepository::class);
        $this->app->bind(BookingRepositoryInterface::class, BookingRepository::class);
        $this->app->bind(SeatRepositoryInterface::class, SeatRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
