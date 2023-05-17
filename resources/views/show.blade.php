<div class="mt-5">
    <input type="hidden" name="show_id" id="show_id" value="{{ $shows->first()->id }}">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        @foreach($shows as $key => $show)
            <li class="nav-item " role="presentation">
                <button class="nav-link selected-show @if($key == 0) active @endif" show-id="{{$show->id}}"
                        id="tab_test_{{$key}}" data-bs-toggle="tab" data-bs-target="#tab_{{$key}}"
                        type="button" role="tab" aria-controls="tab_{{$key}}"
                        aria-selected="true">{{@$show->film->title}}
                </button>
            </li>
        @endforeach
    </ul>

    <div class="tab-content" id="myTabContent">
        @foreach($shows as $key => $show)
            <div class="tab-pane fade @if($key == 0) show active @endif" id="tab_{{$key}}" role="tabpanel"
                 aria-labelledby="tab_test_{{$key}}">
                <div class="d-flex gap-2 mt-3 mb-2">
                    <div class="mr-3" style="margin-right: 15px; margin-left: 15px;">
                        <span style="font-weight: 500">Show Time:</span>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="show_time"
                               id="show_time"
                               value="{{\Carbon\Carbon::parse($show->show_time)->format('h:i A')}}" readonly>

                    </div>
                </div>
                <div class="form-group">
                    <div class="mr-3" style="margin-right: 15px;margin-left: 15px;">
                        <span style="font-weight: 500">Description:</span>
                    </div>
                    <P style="margin-left: 30px;">
                        {{@$show->film->description}}
                    </P>
                </div>

                <div class="available_tickets_container">
                    <div class="container">
                        <div class="seat-selection">
                            <h3>Available Seats {{$show->available_seats}}</h3>

                            <div class="seat-cards">
                                @foreach($seats as $key => $seat)
                                    <div @if(in_array($seat->id,$seatIds)) data-toggle="tooltip" data-placement="top"
                                         title="Seat Not Available"
                                         @endif class="seat-card @if(in_array($seat->id,$seatIds)) booked_seat @endif">
                                        <input type="checkbox" name="num_tickets[]" id="seat-{{$key}}_{{$seat->id}}"
                                               value="{{$seat->id}}">
                                        <label for="seat-{{$key}}_{{$seat->id}}"
                                               class=" seats @if(in_array($seat->id,$seatIds)) booked @endif">
                                            <span><i class="fas fa-chair" style="font-size: 24px;"></i></span>
                                            <span>{{$seat->seat_number}}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="d-flex justify-content-center mt-2">
            <button type="submit" class="btn btn-dark text-center">Book Now</button>
        </div>
    </div>
</div>
