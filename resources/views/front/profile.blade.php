@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">User Profile</div>

                    <div class="card-body">
                        <p>Name: {{$user->name}}</p>
                        <p>Email: {{$user->email}}</p>
                        <p>Address: {{$user->address}}</p>
                        <p>Phone Number: {{$user->phone}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Update Profile</div>

                    <div class="card-body">
                        <form action="{{route('user.profile.store',$user->id)}}" method="post">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" value="{{$user->address}}">

                            </div>
                            <div class="form-group">
                                <label>Phone number</label>
                                <input type="text" name="phone" class="form-control" value="{{$user->phone}}">

                            </div>
                            <br>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Update Image</div>
                    <form action="{{route('user.profile.pic',$user->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="card-body">
                            @if(!$user->image)
                                <img src="{{asset('user/user.png')}}" width="120">
                            @else
                                <img src="{{asset("user/".$user->image)}}" width="120">
                            @endif
                            <br>
                            <br>
                            <input type="file" name="image" class="form-control" required="">
                            <br>
                            @error('file')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <button type="submit" class="btn btn-primary">Update</button>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
