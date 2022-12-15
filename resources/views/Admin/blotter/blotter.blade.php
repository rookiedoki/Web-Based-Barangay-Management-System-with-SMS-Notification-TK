@extends('layout.dashboard-layout')
@section('content')
<style>
  .btns {
    border: none;
    color: white;
    padding: 10px;
    font-size: 8px;
    cursor: pointer;
  }

  .btn1 {
    background-color: #fad710;
  }

  /* view */
  .btn2 {
    background-color: #df1a0c;
  }

  /* delete */
  .btn3 {
    background-color: #17f53c;
  }

  /* download */
  /* Darker background on mouse-over */
  .btn:hover {
    background-color: RoyalBlue;
  }
  #result{
  display: flex;
  gap: 10px;
  padding: 10px 0;
}
.thumbnail {
  height: 200px;
}
</style>
<h2 class="h2 mb-1">Blotter</h2>
<div class="card shadow">
  <div class="card-body">
    <div class="toolbar">
      <form class="form">
        <div class="form-row">
            <div action="/blotter/search" class="form-group col-auto">
                <label for="search" class="sr-only">Search</label>
                <input type="text" class="form-control" id="search" name="search" value="" placeholder="Search">
              </div>
      </div>
      </form>
    </div>
    <!-- table -->
    <table class="table table-borderless table-hover">
      <thead>
        <tr>
          <th>Complainant</th>
          {{-- <th>Respondent</th>
          <th>Victim</th>--}}
          <th>Location</th>
          <th>Date</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>

      @foreach($blo as $blotter)
      <tbody>
        <tr>
          <td class="show" width="25%">{{$blotter->complainant}}</td>
          {{-- <td class="show">{{$blotter->respondent}}</td> --}}
          {{-- <td class="show">{{$blotter->victim}}</td> --}}
          <td class="show" width="30%">{{$blotter->location}}</td>
          <td class="show" width="20%">{{$blotter->date}}</td>
          <td width="20%">
            @if($blotter->estado == 'pending')
            <a href="#editBlotterModal{{$blotter->id}}" class="edit" data-toggle="modal"><button class="btn"><i class="fa fa-eye"></i></button></a>
            @elseif($blotter->estado == 'approved')
            <a href="{{url('/submitBlotter/blotterLetter',$blotter->id)}}">
              <span class="badge badge-success p-2">Approved</span>
            </a>
            @elseif($blotter->estado == 'declined')
            <span class="badge badge-danger p-2">Declined</span>
            @endif
            </td>
            <td>
            <a href="#deleteBlotterModal{{$blotter->id}}" data-toggle="modal"><button class="btns btn2"><i class="fa fa-trash"></i></button></a>
          </td>
        </tr>

        <!---------------------------------------- Delete Blotter Modal HTML -------------------------------------->
        <div id="deleteBlotterModal{{$blotter->id}}" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <form>
                <div class="modal-header">
                  <h4 class="modal-title">Delete Blotter</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>


                <div class="modal-body">
                  <p>Are you sure you want to delete these Records?</p>
                  <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                  <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                  {{-- <input type="submit" href="{{url('deleteBlotter', $blotter->id)}}" class="btn btn-danger" value="Delete"> --}}
                  <a class="btn btn-danger" href="{{url('deleteBlotter',$blotter->id)}}">Delete</a>
                </div>

              </form>
            </div>
          </div>
        </div>
        <!--------------------------------- Submit Blotter Modal HTML ------------------------------------------>
        <div id="editBlotterModal{{$blotter->id}}" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div>
                <div class="modal-header">
                  <h4 class="modal-title">Blotter Complaint Details</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="row register-form">
                  <div class="col-sm-12">
                    <div class="modal-body">

                      <div class="form-group">
                        <label class="fw-bold">Complainant</label>
                        <input class="form-control" style="font-size:15px" rows="5" value="{{ $blotter->complainant }}" disabled>
                      </div>

                      <div class="form-group">
                        <label class="fw-bold">Complainant's Phone Number</label>
                        <input class="form-control" style="font-size:15px" rows="5" value="{{ $blotter->phone_number }}" disabled>
                      </div>

                      <div class="form-group">
                        <label class="fw-bold">Respondents</label>
                        <input class="form-control" style="font-size:15px" rows="5" value="{{ $blotter->respondent }}" disabled>
                      </div>

                      <div class="form-group">
                        <label class="fw-bold">Victim/s</label>
                        <input class="form-control" style="font-size:15px" rows="5" value="{{ $blotter->victim }}" disabled>
                      </div>

                      <div class="form-group">
                        <label class="fw-bold">Location</label>
                        <input class="form-control" style="font-size:15px" rows="5" value="{{ $blotter->location }}" disabled>
                      </div>

                        <div class="form-group">
                          <label class="fw-bold">Details</label>
                          <textarea class="form-control" style="font-size:15px" rows="5" disabled>{{ $blotter->details }}</textarea>
                        </div>

                      </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="modal-body">
                      <label class="fw-bold">Proof</label>
                        <div id="image-show-area">
                            <img class="proof" src="{{$blotter->proof ? asset ('storage/' .$blotter->proof) : asset('/storage/images/-image.png')}}" alt="proof" style="width: 100%" />
                        </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <input type="hidden" name="name" value="---">
                  <a href="{{url('decline-blotter/'.$blotter->id)}}" class="btn btn-danger" class="close">Decline</a>
                  <a href="{{url('/submitBlotter/blotterLetter',$blotter->id)}}" type="submit" class="btn btn-primary">Approve</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<script>
  var loadFile = function(event) {
    var blotter_image2 = document.getElementByID("blotter_image2");
    blotter_image2.src = URL.createObjectURL(event.target.files[0]);
  }
</script>
{{-------------------------------------------ADD Blotter---------------------------------}}
<div id="addBlotterModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="/blotter" method="POST" enctype="multipart/form-data" id="image-upload-preview">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title">Add Blotter</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="row register-form">
          <div class="modal-body">
            <div class="form-group">
              <label class="labelImage">Image</label>
              <img class="preview" id="prview" src="storage/no/-image.png" />
              <input type="file" name="blotter_image" id="blotter_image">
            </div>
            @Error('blotter_image')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>
        </div>
        <div class="row register-form">
          <div class="col-sm-4">
            <div class="modal-body">
              <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" name="first_name" value="{{old('first_name')}}" required autocomplete="first_name">
                @Error('first_name')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <div class="modal-body">
                <label>Middle Name</label>
                <input type="text" class="form-control" name="middle_name" value="{{old('middle_name')}}" required autocomplete="middle_name">
              </div>
              @Error('middle_name')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <div class="modal-body">
                <label>Last Name</label>
                <input type="text" class="form-control" name="last_name" value="{{old('last_name')}}" required autocomplete="last_name">
              </div>
              @Error('last_name')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
          </div>
        </div>
        <div class="row register-form">
          <div class="col-sm-4">
            <div class="modal-body">
              <div class="form-group">
                <label>Nickname</label>
                <input type="text" class="form-control" name="nickname" value="{{old('nickname')}} " required autocomplete="nickname">
              </div>
              @Error('nickname')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <div class="modal-body">
                <label>Place of Birth</label>
                <input type="text" class="form-control" name="place_of_birth" value="{{old('place_of_birth')}}" required autocomplete="place_of_birth">
              </div>
              @Error('place_of_birth')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <div class="modal-body">
                <label>Birthdate</label>
                <input type="date" class="form-control" name="birthdate" value="{{old('birthdate')}}" required autocomplete="birthdate">
              </div>
              @Error('birthdate')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
          </div>
        </div>
        <div class="row register-form">
          <div class="col-sm-4">
            <div class="modal-body">
              <div class="form-group">
                <label>Age</label>
                <input type="text" class="form-control" name="age" value="{{old('age')}}" required autocomplete="age">
              </div>
              @Error('age')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <div class="modal-body">
                <label>Civil Status</label>
                <input type="text" class="form-control" name="civil_status" value="{{old('civil_status')}}" required autocomplete="civil_status">
              </div>
              @Error('civil_status')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <div class="modal-body">
                <label>Gender</label>
                <select class="form-control" name="gender" value="{{old('gender')}}" required autocomplete="gender">
                  <option value="">-Select Gender-</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
              @Error('gender')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
          </div>
        </div>
        <div class="row register-form">
          <div class="col-sm-4">
            <div class="modal-body">
              <div class="form-group">
                <label>Street</label>
                <input type="text" class="form-control" name="street" value="{{old('street')}}" required autocomplete="street">
              </div>
              @Error('street')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <div class="modal-body">
                <label>Voter Status</label>
                <select class="form-control" name="voter_status" value="{{old('voter_status')}}" required autocomplete="voter_status">
                  <option value="">-Select Voter Status-</option>
                  <option value="Voter">Voter</option>
                  <option value="Non Voter">Non Voter</option>
                </select>
              </div>
              @Error('voter_status')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <div class="modal-body">
                <label>Citizenship</label>
                <input type="text" class="form-control" name="citizenship" value="{{old('citizenship')}}" required autocomplete="citizenship">
              </div>
              @Error('citizenship')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
          </div>
        </div>
        <div class="row register-form">
          <div class="col-sm-6">
            <div class="form-group">
              <div class="modal-body">
                <label>Contact Number</label>
                <input type="text" class="form-control" name="phone_number" value="{{old('contact_number')}}" required autocomplete="contact_number">
              </div>
              @Error('phone_number')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <div class="modal-body">
                <label>Occupation</label>
                <input type="text" class="form-control" name="occupation" value="{{old('occupation')}}" required autocomplete="occupation">
              </div>
              @Error('occupation')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
          </div>
        </div>
        <div class="row register-form">
          <div class="col-sm-6">
            <div class="modal-body">
              <div class="form-group">
                <label>Email Address</label>
                <input type="text" class="form-control" name="email" value="{{old('email')}}" required autocomplete="email">
              </div>
              @Error('email')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
          </div>
          <div class="col-sm-6">
            <div class="modal-body">
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" value="{{old('password')}}" required autocomplete="password">
              </div>
              @Error('password')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-success" value="Add">
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
@endsection
