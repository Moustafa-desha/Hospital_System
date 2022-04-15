@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-inbox bg-blue"></i>
                    <div class="d-inline">
                        <h5>All Roles</h5>
                        <span>Roles information</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{url('admin/role/index')}}"><i class="ik ik-home"></i></a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <a href="#"  data-toggle="modal" data-target="#addrole" style="float: right; margin-left:820px;margin-bottom: 5px" class="btn btn-primary"> Add New Role</a>

            <div class="card">
                <div class="card-header"><h3>Data Table</h3>
                </div>
                <div class="card-body">

                    <table id="data_table" class="table">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Permissions</th>
                            <th>Actions</th>
{{--                            <th></th>--}}
{{--                            <th></th>--}}

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($roles as $role)
                        <tr>
                            <td><h5>{{ $role->title }}</h5></td>
                            <td><h5>#</h5></td>
                            <td>
                                <div class="table-actions">
                                    <a href="{{url('admin/role/edit/'.$role->id)}}"><i class="ik ik-edit-2"></i></a>
                                    <a href="javascript:void(0);" onclick="if (confirm('Delete ! Are You Sure'))
                                    {document.getElementById('delete-{{$role->id}}').submit();}  else {return false;}"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                    <form style="display: none" method="post" action="{{url('admin/role/delete/'.$role->id)}}" id="delete-{{$role->id}}">
                                        @method('POST')
                                        @csrf
                                    </form>
                                </div>
                            </td>
                            <td></td>
{{--                            <td></td>--}}

                        </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                    <div style="float:right">
                        {{ $roles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="addrole" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.role.store')}}" method="post">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="exampleInputName1">Role Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="exampleInputName1" placeholder="title" name="title" value="{{ old('title') }}">
                            @error('title')<span class="invalid-feedback" role="alert">{{$message}}</span>@enderror


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                    </form>
            </div>
        </div>
    </div>

@endsection


