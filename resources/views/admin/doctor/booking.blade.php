@extends('admin.layouts.master')

@section('content')

    <form action="{{route('admin.booking.doctor')}}" method="get">

        {{--  Choose Day  --}}

        <div class="col-md-6">
            <div class="card" style="min-height: 200px;">
                <div class="card-header"><h3>Please choose Date</h3></div>
                @if(isset($date))
                    <span style="margin-left: 10px; margin-top: 8px;">Booking for date: {{$date}}</span>
                @endif
                <div class="card-body">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="text" class="form-control datetimepicker-input @error('date') is-invalid @enderror" id="datepicker"
                               data-toggle="datetimepicker" data-target="#datepicker" name="date" autocomplete="off">
                        @error('date')<span class="invalid-feedback" role="alert">{{$message}}</span>@enderror

                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>


    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Your Booking Table</h4>
                </div>
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="card mt-1">--}}
{{--        <div class="card-header">available Booking</div>--}}
{{--        <div class="card-body">--}}

            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Time</th>
                    <th scope="col">Date</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                @forelse($bookings as $key => $book)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        @if($book->user->image != null)
                            <td><img src="{{ asset("user/".$book->user->image) ? : ''}}" width="80" style="border-radius: 50%;"></td>
                        @else
                            <td><img src="{{ asset("user/user.png")}}" width="80" style="border-radius: 50%;"></td>
                        @endif
                        <td>{{$book->user->name}}</td>
                        <td>{{$book->time}}</td>
                        <td>{{$book->date}}</td>
                        <td>{{$book->user->gender}}</td>
                        <td>
                            @if($book->status == 0)
                               <a href="{{route('admin.update.status',$book->id)}}"><button class="btn-sm btn-dark">Not Visited</button></a>
                            @else
                                <a href="{{route('admin.update.status',$book->id)}}"><button class="btn btn-success">Checked</button></a>
                            @endif
                        </td>
                    </tr>
                @empty

                    <td><p>No Available Booking Today</p></td>

                @endforelse
                </tbody>
            </table>

                {{$bookings->links()}}

        </div>
    </div>



@endsection
