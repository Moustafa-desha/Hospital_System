

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$book->user_id}}">
    Add Prescription
</button>

@if(count($bookings)>0)
    <!-- Modal -->
    <div class="modal fade" id="exampleModal{{$book->user_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Prescriptions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.prescription.store')}}" method="post">
                    @method('POST')
                    @csrf
                    <div class="modal-body">

                        <input type="hidden" name="date" value="{{$book->date}}">
                        <input type="hidden" name="doctor_id" value="{{$book->doctor_id}}">
                        <input type="hidden" name="user_id" value="{{$book->user_id}}">

                        <div class="form-group">
                            <label>Disease</label>
                            <input type="text" name="disease_name" class="form-control @error('disease_name') invalid-feedback @enderror" required>
                        </div>
                        @error('disease_name') <span class="invalid-feedback" role="alert">{{$message}}</span> @enderror



                        <div class="form-group">
                            <label>Medicine</label>
                            <input type="text" name="medicine" data-role="tagsinput" class="form-control @error('medicine') invalid-feedback @enderror" required>
                        </div>
                        @error('medicine') <span class="invalid-feedback" role="alert">{{$message}}</span> @enderror


                        <div class="form-group">
                            <label>Symptoms</label>
                            <textarea  name="symptoms" class="form-control @error('symptoms') invalid-feedback @enderror" required></textarea>
                        </div>
                        @error('symptoms') <span class="invalid-feedback" role="alert">{{$message}}</span> @enderror


                        <div class="form-group">
                            <label>how use medicine</label>
                            <textarea  name="how_use_medicine" class="form-control @error('how_use_medicine') @enderror" required></textarea>
                        </div>
                        @error('how_use_medicine') <span class="invalid-feedback" role="alert">{{$message}}</span> @enderror



                        <div class="form-group">
                            <label>Feedback</label>
                            <textarea  name="feedback" class="form-control @error('feedback') @enderror" required></textarea>
                        </div>
                        @error('feedback') <span class="invalid-feedback" role="alert">{{$message}}</span> @enderror


                        <div class="form-group">
                            <label>Signature</label>
                            <input type="text" name="signature" class="form-control @error('signature') @enderror" required>
                        </div>
                        @error('signature') <span class="invalid-feedback" role="alert">{{$message}}</span> @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
