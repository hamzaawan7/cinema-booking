@extends('layouts.master')
@section('content')

    <div class="mt-5">
        <table class="table">
            <thead class="table-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th>Theatre</th>
                <th>Seat Number</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @if($user->bookings->isNotEmpty())
                @foreach($user->bookings as $index => $booking)
                    @php
                        $showTime = \Carbon\Carbon::parse($booking->show->show_time);
                        $cancelTime = \Carbon\Carbon::now()->addHour();
                    @endphp

                    <tr>
                        @if ($index == 0)
                            <td rowspan="{{ count($user->bookings) }}">{{@$user->name}}</td>
                            <td rowspan="{{ count($user->bookings) }}">{{@$user->email}}</td>
                        @endif

                        <td>{{$booking->show->theatre->name}}</td>
                        <td>{{$booking->seat->seat_number}}</td>

                        @if ($cancelTime->lt($showTime))
                            <td>
                                <a href="{{route('cancel-booking',['id' => $booking->id])}}"
                                   class="btn btn-danger">Cancel Booking
                                </a>
                            </td>
                        @endif
                    </tr>

                @endforeach
            @endif
            </tbody>
        </table>
    </div>

@endsection
