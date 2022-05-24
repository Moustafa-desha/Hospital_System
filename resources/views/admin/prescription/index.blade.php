@extends('admin.layouts.master')

@section('content')




    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Prescriptions</h4>
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
                        <th scope="col">Prescription</th>
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
                                    <a href="#"><button class="btn-sm btn-dark">Not Visited</button></a>
                                @else
                                    <a href="#"><button class="btn btn-success">Checked</button></a>
                                @endif
                            </td>
                            <td>
                                @if(!\App\Models\Prescription::where('user_id',$book->user_id)->where('doctor_id',Auth::id())->exists())
                               @include('admin.prescription.addModal')
                                @else
{{--                                    @include('admin.prescription.viewModal')--}}
                                    <a class="btn btn-primary" href="{{url("admin/prescription/view/".$book->user_id)}}">View</a>
                                    <a class="btn btn-info" href="{{url("admin/prescription/edit/".$book->user_id)}}">Edit</a>
                                @endif
                            </td>
                        </tr>
                    @empty

                        <td><p>No Available Data Today</p></td>

                    @endforelse
                    </tbody>
                </table>

                {{$bookings->links()}}

            </div>
        </div>


@endsection
