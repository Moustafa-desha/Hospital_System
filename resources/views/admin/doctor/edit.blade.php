@extends('admin.layouts.master')

@section('content')

    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>Edit Doctor</h5>
                        <span>edit doctor information contact</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{url('admin/doctor/index')}}"><i class="ik ik-home"></i> All Admin</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h3>Edit Doctor Form</h3></div>
            <div class="card-body">
                <form class="forms-sample" method="POST" action="{{route('admin.update.doctor',$user->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="exampleInputName1">Full Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName1" placeholder="name" name="name" value="{{ old('name',$user->name) }}">
                        @error('name')<span class="invalid-feedback" role="alert">{{$message}}</span>@enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail3">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail3" placeholder="Email" name="email" value="{{ old('email',$user->email) }}">
                                @error('email')<span class="invalid-feedback" role="alert">{{$message}}</span>@enderror

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleSelectGender">Gender</label>
                                <select class="form-control @error('gender') is-invalid @enderror" id="exampleSelectGender" name="gender" value="{{ old('gender',$user->gender) }}">
                                    <option value="{{$user->gender}}">{{$user->gender}}</option>
                                </select>
                                @error('gender')<span class="invalid-feedback" role="alert">{{$message}}</span>@enderror

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword4">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword4" placeholder="Password" name="password" value="{{ old('password') }}">
                                @error('password')<span class="invalid-feedback" role="alert">{{$message}}</span>@enderror

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName5">Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="exampleInputName5" placeholder="phone" name="phone" value="{{old('phone', $user->phone) }}">
                                @error('phone')<span class="invalid-feedback" role="alert">{{$message}}</span>@enderror

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName6">Specialist</label>
                                <input type="text" class="form-control @error('department') is-invalid @enderror" id="exampleInputName6" placeholder="Specialist" name="department" value="{{ old('department',$user->department) }}">
                                @error('department')<span class="invalid-feedback" role="alert">{{$message}}</span>@enderror

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName7">Education</label>
                                <input type="text" class="form-control @error('education') is-invalid @enderror" id="exampleInputName7" placeholder="Specialist" name="education" value="{{ old('education',$user->education) }}">
                                @error('education')<span class="invalid-feedback" role="alert">{{$message}}</span>@enderror

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName8">Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" id="exampleInputName8" placeholder="Specialist" name="address" value="{{ old('address',$user->address) }}">
                                @error('address')<span class="invalid-feedback" role="alert">{{$message}}</span>@enderror

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">Role</label>
                                <select name="role_id" class="form-control @error('role_id') is-invalid @enderror" value="{{ $user->role_id }}">
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}" {{ $role->id == $user->role_id ? "selected"  : '' }}> {{ $role->title }} </option>
                                    @endforeach
                                </select>
                                @error('role_id')<span class="invalid-feedback" role="alert">{{$message}}</span>@enderror

                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label>File upload</label>
                        <div class="input-group col-xs-12">
                            <input type="file" name="image" class="form-control file-upload-info @error('image') is-invalid @enderror">
                            <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary" type="button">Browse</button>
                                                    </span>
                        </div>
                        <img class="form-group" style="width: 100px" src="{{asset('admin/media/'.$user->image)}}">
                        @error('image')<span class="alert-danger">{{$message}}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="exampleTextarea1" rows="4" name="description">{{ old('description',$user->description) }}</textarea>
                        @error('description')<span class="invalid-feedback" role="alert">{{$message}}</span>@enderror

                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>

@endsection
