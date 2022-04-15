@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-inbox bg-blue"></i>
                    <div class="d-inline">
                        <h5>All Doctor</h5>
                        <span>Doctor information</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{url('admin/doctor/index')}}"><i class="ik ik-home"></i></a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <a href="{{route('admin.create.doctor')}}" style="float: right; margin-left:820px;margin-bottom: 5px" class="btn btn-primary"> Add New Doctor</a>

            <div class="card">
                <div class="card-header"><h3>Data Table</h3>
                </div>
                <div class="card-body">
{{--                   <div class="table-responsive">--}}
                    <table id="data_table" class="table">
                        <thead>
                        <tr>
                            <th class="nosort">Avatar</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>phone</th>
                            <th>department</th>
                            <th></th>
                            <th></th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data as $user)
                        <tr>
                            <td><img src="{{ asset('admin/media/'.$user->image) }}" class="table-user-thumb" alt=""></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email}}</td>
                            <td>{{ $user->address}}</td>
                            <th>{{ $user->phone}}</th>
                            <th>{{ $user->department}}</th>
                            <td>
                                <div class="table-actions">
{{--                                    <a href="{{url('admin/doctor/show/'.$user->id)}}" >--}}
{{--                                        <i class="ik ik-eye" ></i>--}}
{{--                                    </a>--}}
                                    <a href="{{url('admin/doctor/edit/'.$user->id)}}"><i class="ik ik-edit-2"></i></a>
                                    <a href="javascript:void(0);" onclick="document.getElementById('delete-{{$user->id}}').submit();"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                    <form style="display: none" method="post" action="{{url('admin/doctor/delete/'.$user->id)}}" id="delete-{{$user->id}}">
                                        @method('POST')
                                        @csrf
                                    </form>
                                    @include('admin.doctor.modalShow')
                                </div>
                            </td>
                        </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
{{--                   </div>--}}
                    <div style="float:right">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


