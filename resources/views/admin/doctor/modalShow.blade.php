<a href="#" data-toggle="modal" data-target="#ShowUser-{{ $user->id }}">
    <i class="ik ik-eye"></i>
</a>
<!-- MODAL
================================================== -->
<div class="modal fade"   id="ShowUser-{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Doctor Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="header"  style="text-align:left">
                    <div class="card" style="width: 100%">
                        <img src="{{ asset('admin/media/'.$user->image) }}" class="card-img-top" alt="image" style="width: 120px">
                        <div class="card-body">
                            <h5 class="card-title"><span class="text-blue">Name:</span> {{$user->name}}</h5>
                            <p class="card-text"><span class="text-blue">About:</span> {{$user->description}}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span class="text-blue">Email:</span> {{$user->email}}</li>
                            <li class="list-group-item"><span class="text-blue">Name:</span> {{$user->gender}}</li>
                            <li class="list-group-item"><span class="text-blue">Address:</span> {{$user->address}}</li>
                            <li class="list-group-item"><span class="text-blue">Phone number:</span> {{$user->phone}}</li>
                            <li class="list-group-item"><span class="text-blue">Department:</span> {{$user->department}}</li>
                            <li class="list-group-item"><span class="text-blue">Education:</span> {{$user->education}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
</div>

