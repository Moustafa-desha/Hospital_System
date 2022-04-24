@extends('layouts.app')

@section('content')

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
                    <th scope="col">Doctor</th>
                    <th scope="col">Time</th>
                    <th scope="col">Date</th>
                    <th scope="col">Department</th>
                    <th scope="col">Status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @forelse($bookings as $key => $book)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        @if($book->doctor->image != null)
                            <td><img src="{{ asset("admin/media/".$book->doctor->image) ? : ''}}" width="80" style="border-radius: 50%;"></td>
                        @else
                            <td><img src="{{ asset("doctors/doctor.png")}}" width="80" style="border-radius: 50%;"></td>
                        @endif
                        <td>{{$book->doctor->name}}</td>
                        <td>{{$book->time}}</td>
                        <td>{{$book->date}}</td>
                        <td>{{$book->doctor->department}}</td>
                        <td>
                            @if($book->status == 0)
                                <button class="btn-sm btn-dark">Not Visited</button>
                            @else
                                <button class="btn btn-success">Checked</button>

                            @endif
                        </td>
                    </tr>
                @empty

                    <td><p>No Available Doctors Today</p></td>

                @endforelse
                </tbody>
            </table>
                {{$bookings->links()}}
        </div>
    </div>



@endsection
