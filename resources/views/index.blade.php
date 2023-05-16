@extends('layouts.master')
@section('content')

    <div class="card mt-5 mb-5">
        <div class="card-header bg-dark">
            <h3 class="text-white">Select Cinema And Theatre</h3>
        </div>

        <form method="post" action="{{route('cinema-booking')}}">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="mb-2">Select Cinema</label>
                            <select class="form-select" id="cinema_id" aria-label="Default select example"
                                    name="cinema_id">
                                <option value=""> -----</option>
                                @foreach($cinemas as $cinema)
                                    <option value="{{$cinema->id}}">{{$cinema->name}}</option>
                                @endforeach
                            </select>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="mb-2">Select Theatre</label>
                            <select class="form-select" id="theatre" name="theatre_id"
                                    aria-label="Default select example">
                                <option selected>Select Theatre</option>

                            </select>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                </div>
                <div id="show_content">

                </div>
            </div>
        </form>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('js/cinema-booking-script.js')}}"></script>
@endsection
