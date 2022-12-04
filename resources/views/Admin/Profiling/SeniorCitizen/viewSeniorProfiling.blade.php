@extends('layout.dashboard-layout')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card shadow mb-4">
      <div class="card-header">
        <h2 style="padding-left: 20px; padding-top: 20px">RESIDENT SENIOR CITIZEN PROFILE</h2>
      </div>
      <div class="card-body">
        <form  method="POST" action="/addListSenior/{{$senProfiling->id}}" class="col-lg-8 col-md-8 col-10 mx-auto"  >
            @csrf

            
            <label class="labelImage">Senior Citizen ID</label>
            <a href="#showImage" class="show" data-toggle="modal"><img class="previewww" id="preview" src="{{$senProfiling->senior_id? asset ('storage/' .$senProfiling->senior_id) : asset('/storage/no/-image.png')}}" alt="" /></a>
          <div class="form-row">

                 <div class="form-group col-md-12">
                      <label for="inputPassword4">Name</label>
                      <input readonly  name="name" class="form-control" value="{{$senProfiling->name}}">
                </div>
          </div>
          <div class="form-row">

              <div class="form-group col-md-6">
                <label for="inputAddress">Birthdate</label>
                <input readonly  name="birthdate" class="form-control" id="inputAddress5" value="{{$senProfiling->birthdate}}">
              </div>

                  <div class="form-group col-md-6">
                    <label for="inputAddress2">Age</label>
                    <input readonly  name="age" class="form-control" id="inputAddress6" value="{{$senProfiling->age}}">
                  </div>

        </div>
          <div class="form-row">
                <div class="form-group col-sm-4">
                  <label for="inputCity">Gender</label>
                  <input readonly  name="gender" class="form-control" value="{{$senProfiling->gender}}">
                </div>


           <div class="form-group col-sm-4">
              <label for="inputZip">OSCA ID NO.</label>
              <input readonly name="osca_no" class="form-control" value="{{$senProfiling->osca_no}}">
            </div>


                <div class="form-group col-sm-4">
                  <label for="inputZip">Date of Issue</label>
                  <input readonly  name="date_issue" class="form-control" value="{{$senProfiling->date_issue}}">
                </div>
          </div>

          <button type="submit" class="btn btn-primary">Add to List</button>
        </form>
      </div> <!-- /. card-body -->
    </div> <!-- /. card -->
  </div> <!-- /. col -->
</div> <!-- /. end-section -->


<div id="showImage" class="modal fade">
  <div class="modal-dialog">
      <div class="modal-content">
          <form>
              <div class="modal-header">						
                  <h4 class="modal-title">View Senior ID</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>


              <div class="modal-body">					
                <div id="image-show-area">
                  <img class="id-birth" src="{{$senProfiling->senior_id ? asset ('storage/' .$senProfiling->senior_id) : asset('/storage/images/-image.png')}}" alt=""  />
                </div>
              </div>
              <div class="modal-footer">
                  <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
              </div>

          </form>
      </div>
  </div>
</div>

@endsection