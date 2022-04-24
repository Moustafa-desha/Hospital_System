@extends('admin.layouts.master')

@section('content')


    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>Add New Appointment</h5>
                        <span>add appointment and fill all field time</span>
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


<form action="{{route('admin.appoint.store')}}" method="post">
    @csrf
    @method('POST')
    {{--  Choose Day  --}}

    <div class="col-md-6">
        <div class="card" style="min-height: 200px;">
            <div class="card-header"><h3>Please choose Date</h3></div>
            <div class="card-body">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="text" class="form-control datetimepicker-input @error('date') is-invalid @enderror" id="datepicker"
                               data-toggle="datetimepicker" data-target="#datepicker" name="date" autocomplete="off">
                        @error('date')<span class="invalid-feedback" role="alert">{{$message}}</span>@enderror

                    </div>
            </div>
        </div>
    </div>


    {{-- Choose time --}}

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
        <tr>
            <th scope="row">AM</th>
            <td><input type="checkbox" name="time[]" value="8am"> 8</td>
            <td><input type="checkbox" name="time[]" value="8:20am"> 8:20</td>
            <td><input type="checkbox" name="time[]" value="8:40am"> 8:40</td>
        </tr>
        <tr>
            <th scope="row">AM</th>
            <td><input type="checkbox" name="time[]" value="9am"> 9</td>
            <td><input type="checkbox" name="time[]" value="9:20am"> 9:20</td>
            <td><input type="checkbox" name="time[]" value="9:40am"> 9:40</td>
        </tr>
        <tr>
            <th scope="row">AM</th>
            <td><input type="checkbox" name="time[]" value="10am"> 10</td>
            <td><input type="checkbox" name="time[]" value="10:20am"> 10:20</td>
            <td><input type="checkbox" name="time[]" value="10:40am"> 10:40</td>
        </tr>
        <tr>
            <th scope="row">AM</th>
            <td><input type="checkbox" name="time[]" value="11am"> 11</td>
            <td><input type="checkbox" name="time[]" value="11:20am"> 11:20</td>
            <td><input type="checkbox" name="time[]" value="11:40am"> 11:40</td>
        </tr>
        <tr>
            <th scope="row">AM</th>
            <td><input type="checkbox" name="time[]" value="12am"> 12</td>
            <td><input type="checkbox" name="time[]" value="12:20am"> 12:20</td>
            <td><input type="checkbox" name="time[]" value="12:40am"> 12:40</td>
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
            <td><input type="checkbox" name="time[]" value="1pm"> 1</td>
            <td><input type="checkbox" name="time[]" value="1:20pm"> 1:20</td>
            <td><input type="checkbox" name="time[]" value="1:40pm"> 1:40</td>
        </tr>
        <tr>
            <th scope="row">PM</th>
            <td><input type="checkbox" name="time[]" value="2pm"> 2</td>
            <td><input type="checkbox" name="time[]" value="2:20pm"> 2:20</td>
            <td><input type="checkbox" name="time[]" value="2:40pm"> 2:40</td>
        </tr>
        <tr>
            <th scope="row">PM</th>
            <td><input type="checkbox" name="time[]" value="3pm"> 3</td>
            <td><input type="checkbox" name="time[]" value="3:20pm"> 3:20</td>
            <td><input type="checkbox" name="time[]" value="3:40pm"> 3:40</td>
        </tr>
        <tr>
            <th scope="row">PM</th>
            <td><input type="checkbox" name="time[]" value="4pm"> 4</td>
            <td><input type="checkbox" name="time[]" value="4:20pm"> 4:20</td>
            <td><input type="checkbox" name="time[]" value="4:40pm"> 4:40</td>
        </tr>
        </tbody>
    </table>

    <div class="card">
        <div class="card-body">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </div>

</form>
@endsection
