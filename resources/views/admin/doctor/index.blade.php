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
                            <a href="../index.html"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Doctors</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Doctors </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>Data Table</h3></div>
                <div class="card-body">
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
                        @forelse($data as $value)
                        <tr>
                            <td><img src="{{ asset('admin/media/'.$value->image) }}" class="table-user-thumb" alt=""></td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email}}</td>
                            <td>{{ $value->address}}</td>
                            <th>{{ $value->phone}}</th>
                            <th>{{ $value->department}}</th>
                            <td>
                                <div class="table-actions">
                                    <a  href="#"><i class="ik ik-eye" ></i></a>
                                    <a href="#"><i class="ik ik-edit-2"></i></a>
                                    <a href="#"><i class="ik ik-trash-2"></i></a>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <div class="alert-warning">No Data</div>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
