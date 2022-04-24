@extends('admin.layouts.master')

@section('content')


    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>All Appointment</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.appoint.index')}}"><i class="ik ik-home"></i> Appointment</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


<form action="{{route('admin.appoint.check')}}" method="post">
    @csrf
    @method('POST')
    {{--  Choose Day  --}}

    <div class="col-md-6">
        <div class="card" style="min-height: 200px;">
            <div class="card-header"><h3>Please choose Date</h3></div>
            @if(isset($date))
                <span style="margin-left: 10px; margin-top: 8px;">Appointments for date: {{$date}}</span>
            @endif
            <div class="card-body">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="text" class="form-control datetimepicker-input @error('date') is-invalid @enderror" id="datepicker"
                               data-toggle="datetimepicker" data-target="#datepicker" name="date" autocomplete="off">
                        @error('date')<span class="invalid-feedback" role="alert">{{$message}}</span>@enderror

                    </div>
            </div>
            <button type="submit" class="btn btn-primary">Check</button>
        </div>
    </div>
</form>


    @if(isset($times))
        {{-- All time --}}

        <form action="{{route('admin.appoint.update')}}" method="post">
            @csrf
            @method('POST')
    <input type="checkbox" onclick="for (c in document.getElementsByName('time[]'))
         document.getElementsByName('time[]').item(c).checked=this.checked">
    <i class="fas fa-check-double"> Check All </i>
        <table class="table" style="margin-top: 5px;">
            <thead class="thead-dark">
            <tr>
                <th scope="col">AM</th>
                <th scope="col">AM</th>
                <th scope="col">AM</th>
                <th scope="col">AM</th>
            </tr>
            </thead>
            <tbody>
            <input type="hidden" name="appointment_id" value="{{$appointId}}">
            <tr>
                <th scope="row">AM</th>
                <td><input type="checkbox" name="time[]" value="8am" {{$times->contains('time','8am') ? 'checked' : ''}}> 8</td>
                <td><input type="checkbox" name="time[]" value="8:20am" {{$times->contains('time','8:20am') ? 'checked' : ''}}> 8:20</td>
                <td><input type="checkbox" name="time[]" value="8:40am" {{$times->contains('time','8:40am') ? 'checked' : ''}}> 8:40</td>
            </tr>
            <tr>
                <th scope="row">AM</th>
                <td><input type="checkbox" name="time[]" value="9am" {{$times->contains('time','9am') ? 'checked' : ''}}> 9</td>
                <td><input type="checkbox" name="time[]" value="9:20am" {{$times->contains('time','9:20am') ? 'checked' : ''}}> 9:20</td>
                <td><input type="checkbox" name="time[]" value="9:40am" {{$times->contains('time','9:40am') ? 'checked' : ''}}> 9:40</td>
            </tr>
            <tr>
                <th scope="row">AM</th>
                <td><input type="checkbox" name="time[]" value="10am" {{$times->contains('time','10am') ? 'checked' : ''}}> 10</td>
                <td><input type="checkbox" name="time[]" value="10:20am" {{$times->contains('time','10:20am') ? 'checked' : ''}}> 10:20</td>
                <td><input type="checkbox" name="time[]" value="10:40am" {{$times->contains('time','10:40am') ? 'checked' : ''}}> 10:40</td>
            </tr>
            <tr>
                <th scope="row">AM</th>
                <td><input type="checkbox" name="time[]" value="11am" {{$times->contains('time','11am') ? 'checked' : ''}}> 11</td>
                <td><input type="checkbox" name="time[]" value="11:20am" {{$times->contains('time','11:20am') ? 'checked' : ''}}> 11:20</td>
                <td><input type="checkbox" name="time[]" value="11:40am" {{$times->contains('time','11:40am') ? 'checked' : ''}}> 11:40</td>
            </tr>
            <tr>
                <th scope="row">AM</th>
                <td><input type="checkbox" name="time[]" value="12am" {{$times->contains('time','12am') ? 'checked' : ''}}> 12</td>
                <td><input type="checkbox" name="time[]" value="12:20am" {{$times->contains('time','12:20am') ? 'checked' : ''}}> 12:20</td>
                <td><input type="checkbox" name="time[]" value="12:40am" {{$times->contains('time','12:40am') ? 'checked' : ''}}> 12:40</td>
                </tr2
            </tbody>
        </table>

        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">PM</th>
                <th scope="col">PM</th>
                <th scope="col">PM</th>
                <th scope="col">PM</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">PM</th>
                <td><input type="checkbox" name="time[]" value="1pm" {{$times->contains('time','1pm') ? 'checked' : ''}}> 1</td>
                <td><input type="checkbox" name="time[]" value="1:20pm" {{$times->contains('time','1:20pm') ? 'checked' : ''}}> 1:20</td>
                <td><input type="checkbox" name="time[]" value="1:40pm" {{$times->contains('time','1:40pm') ? 'checked' : ''}}> 1:40</td>
            </tr>
            <tr>
                <th scope="row">PM</th>
                <td><input type="checkbox" name="time[]" value="2pm" {{$times->contains('time','2pm') ? 'checked' : ''}}> 2</td>
                <td><input type="checkbox" name="time[]" value="2:20pm" {{$times->contains('time','2:20pm') ? 'checked' : ''}}> 2:20</td>
                <td><input type="checkbox" name="time[]" value="2:40pm" {{$times->contains('time','2:40pm') ? 'checked' : ''}}> 2:40</td>
            </tr>
            <tr>
                <th scope="row">PM</th>
                <td><input type="checkbox" name="time[]" value="3pm" {{$times->contains('time','3pm') ? 'checked' : ''}}> 3</td>
                <td><input type="checkbox" name="time[]" value="3:20pm" {{$times->contains('time','3:20pm') ? 'checked' : ''}}> 3:20</td>
                <td><input type="checkbox" name="time[]" value="3:40pm" {{$times->contains('time','3:40pm') ? 'checked' : ''}}> 3:40</td>
            </tr>
            <tr>
                <th scope="row">PM</th>
                <td><input type="checkbox" name="time[]" value="4pm" {{$times->contains('time','4pm') ? 'checked' : ''}}> 4</td>
                <td><input type="checkbox" name="time[]" value="4:20pm" {{$times->contains('time','4:20pm') ? 'checked' : ''}}> 4:20</td>
                <td><input type="checkbox" name="time[]" value="4:40pm" {{$times->contains('time','4:40pm') ? 'checked' : ''}}> 4:40</td>
            </tr>
            </tbody>
        </table>


        <div class="card">
            <div class="card-body">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </div>
        </form>


    @else
        <h5>Your Appointments list: {{$appoints->count()}}</h5>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">View/Edit</th>

            </tr>
            </thead>
            <tbody>
            @foreach($appoints as $key=> $appoint)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$appoint->date}}</td>
                <td>
                    <form action="{{route('admin.appoint.check')}}" method="post">
                        @csrf
                        @method('POST')
                        <input type="hidden" value="{{$appoint->date}}" name="date">
                        <button type="submit" class="btn btn-primary">View/Edit</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    @endif

@endsection
