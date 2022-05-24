@extends('admin.layouts.master')

@section('content')


    <div class="card">
            <div class="card-body">
                    <form action="{{url('admin/prescription/save/edit/'.$prescription->id)}}" method="POST">
                        @csrf
                        @method('POST')


{{--                        <input type="hidden" name="date" value="{{$prescription->date}}">--}}
                        <input type="hidden" name="doctor_id" value="{{$prescription->doctor_id}}">
                        <input type="hidden" name="user_id" value="{{$prescription->user_id}}">


                        <div class="form-group">
                            <label>Disease</label>
                            <input type="text" name="disease_name" class="form-control" value="{{$prescription->disease_name}}">
                        </div>

                        <div class="form-group">
                            <label>Medicine</label>
                            <input type="text" name="medicine" data-role="tagsinput"  class="form-control" value="{{$prescription->medicine}}" >
                        </div>

                        <div class="form-group">
                            <label>Symptoms</label>
                            <textarea  name="symptoms" class="form-control" >{{$prescription->symptoms}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>how use medicine</label>
                            <textarea  name="how_use_medicine" class="form-control">{{$prescription->how_use_medicine}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Feedback</label>
                            <textarea  name="feedback" class="form-control">{{$prescription->feedback}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Signature</label>
                            <input type="text" name="signature" class="form-control" value="{{$prescription->signature}}" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
            </div>
         </form>
@endsection
{{--@endif--}}
