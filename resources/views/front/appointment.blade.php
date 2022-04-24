@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Doctor Information</h4>
                        <img  src="{{asset('admin/media/'.$appoint->doctor->image)}}" width="100px" style="border-radius: 50%;" >
                        <br>
                        <p class="lead"> Name: {{ucfirst($appoint->doctor->name)}}</p>
                        <p class="lead"> Degree: {{$appoint->doctor->education}}</p>
                        <p class="lead"> Specialist: {{$appoint->doctor->department}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                    @if(Session::has('errorMessage'))
                        <div class="alert alert-danger">
                            {{Session::get('errorMessage')}}
                        </div>
                    @endif

                <form action="{{route('user.make.appoint')}}" method="post">
                    @csrf
                    @method('POST')
                    <div class="card">
                        <div class="card-header lead">{{$appoint->date}}</div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($times as $time)
                                    <div class="col-md-3">
                                        <label class="btn btn-outline-primary" style="margin: 5px">
                                            <input type="radio" name="time" value="{{$time->time}}" >
                                            <span>{{$time->time}}
                                    </span>
                                        </label>
                                        @error('time')<span class="alert-danger">{{$message}}</span>@enderror
                                    </div>
                                    <input type="hidden" name="doctorId" value="{{$appoint->admin_id}}">
                                    <input type="hidden" name="appointmentId" value="{{$appoint->id}}">
                                    <input type="hidden" name="date" value="{{$appoint->date}}">

                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success" style="width: 100%;">Book Appointment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
