
@extends('admin.layouts.master')
@section('content')
    <div class="header">
        <h5>Doctor information</h5>
    <div class="card" style="width: 18rem;">
        <img src="{{ asset('admin/media/'.$user->image) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><span class="text-blue">Name:</span> {{$user->name}}</h5>
            <p class="card-text"><span class="text-blue">About:</span> {{$user->description}}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><span class="text-blue">Email:</span> {{$user->email}}</li>
            <li class="list-group-item"><span class="text-blue">Name:</span> {{$user->gender}}</li>
            <li class="list-group-item"><span class="text-blue">Address:</span> {{$user->address}}</li>
            <li class="list-group-item"><span class="text-blue">Phone number:</span> {{$user->phone}}</li>
            <li class="list-group-item"><span class="text-blue">Department:</span> {{$user->department}}</li>
            <li class="list-group-item"><span class="text-blue">Education:</span> {{$user->education}}</li>


        </ul>
{{--        <div class="card-body">--}}
{{--            <a href="#" class="card-link">Card link</a>--}}
{{--            <a href="#" class="card-link">Another link</a>--}}
{{--        </div>--}}
    </div>
@endsection
