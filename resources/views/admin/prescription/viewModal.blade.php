@extends('admin.layouts.master')

@section('content')


    <div class="card">
            <div class="card-body">

                        <div class="form-group">
                            <label>Disease</label>
                            <input type="text" name="disease_name" class="form-control" value="{{$prescription->disease_name}}" readonly="readonly">
                        </div>

                        <div class="form-group">
                            <label>Medicine</label>
                            <input type="text" name="medicine"  class="form-control" value="{{$prescription->medicine}}" readonly="readonly">
                        </div>

                        <div class="form-group">
                            <label>Symptoms</label>
                            <textarea  name="symptoms" class="form-control" readonly="readonly">{{$prescription->symptoms}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>how use medicine</label>
                            <textarea  name="how_use_medicine" class="form-control"readonly="readonly">{{$prescription->how_use_medicine}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Feedback</label>
                            <textarea  name="feedback" class="form-control"readonly="readonly">{{$prescription->feedback}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Signature</label>
                            <input type="text" name="signature" class="form-control" value="{{$prescription->signature}}" readonly="readonly">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
            </div>

@endsection
{{--@endif--}}
