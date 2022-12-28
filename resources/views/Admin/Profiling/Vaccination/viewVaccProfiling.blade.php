@extends('layout.dashboard-layout')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card shadow mb-4">
      <div class="card-header">
        
        <h2 style="padding-left: 20px; padding-top: 20px">RESIDENT VACCINATION PROFILE</h2>
      </div>
      
      <div class="card-body">

      @if($vaccProfiling->dose=='With Booster')
      <div class="form-row">
          <div class="form-group col-sm-5" style="padding-left: 250px">
              <label class="labelImage" style="font-weight: 800">Vaccination Card</label>
              <a href="#showImage" class="show" data-toggle="modal"><img class="previewww" id="preview" src="{{$vaccProfiling->vaccine_image? asset ('storage/' .$vaccProfiling->vaccine_image) : asset('/storage/no/-image.png')}}" alt="" style="padding-bottom: 20px" /></a>
          </div>

          <div class="form-group col-sm-5">
            <label class="labelImage" style="font-weight: 800">Booster Card</label>
            <a href="#showImage" class="show" data-toggle="modal"><img class="previewww" id="preview" src="{{$vaccProfiling->booster_image? asset ('storage/' .$vaccProfiling->booster_image) : asset('/storage/no/-image.png')}}" alt="" style="padding-bottom: 20px" /></a>
          </div>
      </div>
        <form  method="POST" action="/addListVaccinated/{{$vaccProfiling->id}}" class="col-lg-8 col-md-8 col-10 mx-auto"  >
            @csrf
            
            <div class="form-row">
              <div class="form-group col-sm-5">
                      <label>Name</label>
                      <input readonly name="dose" class="form-control" value="{{$vaccProfiling->name}}">
              </div>
              <div class="form-group col-sm-3">
                <label>Age</label>
                <input readonly name="dose" class="form-control" value="{{$vaccProfiling->age}}">
              </div>

              <div class="form-group col-sm-4">
                <label>Birthdate</label>
                <input readonly name="dose" class="form-control" value="{{$vaccProfiling->birthdate}}">
              </div>
        </div>    
          <div class="form-row">
            <div class="form-group col-sm-4">
                    <label>Status</label>
                    <input readonly name="dose" class="form-control" value="{{$vaccProfiling->dose}}">
                </div>

                <div class="form-group col-sm-4">
                    <label>Type of Vaccine</label>
                    <input readonly  name="vaccine_type" class="form-control" value="{{$vaccProfiling->vaccine_type}}">
                </div>

                <div class="form-group col-sm-4">
                    <label>Vaccination Address</label>
                    <input readonly  name="address" class="form-control" value="{{$vaccProfiling->address}}">
                </div>
           </div>
          <div class="form-row">

              <div class="form-group col-md-6">
                <label>Date of First Dose</label>
                <input readonly name="first_dose" class="form-control" id="inputAddress5" value="{{$vaccProfiling->date_first}}">
              </div>
              <div class="form-group col-md-6">
                  <label>Date of Second Dose</label>
                  <input readonly  name="date_first" class="form-control" id="inputAddress6" value="{{$vaccProfiling->date_second}}">
              </div>

        </div>
          <div class="form-row">
              <div class="form-group col-md-3">
                  <label for="inputCity">1st Booster Vaccine</label>
                  <input readonly  name="second_dose" class="form-control" value="{{$vaccProfiling->first_booster}}">
              </div>

              <div class="form-group col-md-3">
                  <label>Date of 1st Booster</label>
                  <input readonly  name="first_booster_date" class="form-control" value="{{$vaccProfiling->first_booster_date}}">
              </div>

                <div class="form-group col-md-3">
                  <label>2nd Booster Vaccine</label>
                  <input readonly  name="booster" class="form-control" value="{{$vaccProfiling->second_booster}}">
                </div>

                <div class="form-group col-md-3">
                  <label>Date of 2nd Booster</label>
                  <input readonly  name="booster_date" class="form-control" value="{{$vaccProfiling->second_booster_date}}">
                </div>

            <div class="form-group">

           </div>
          </div>
          <button type="submit" class="btn btn-primary">Add to List</button>
        </form>
        @endif


        @if($vaccProfiling->dose=='Partially Vaccinated')
                <label class="labelImage" style="font-weight: 800">Vaccination Card</label>
                <a href="#showImage" class="show" data-toggle="modal"><img class="previewww" id="preview" src="{{$vaccProfiling->vaccine_image? asset ('storage/' .$vaccProfiling->vaccine_image) : asset('/storage/no/-image.png')}}" alt="" style="padding-bottom: 20px" /></a>
          <form  method="POST" action="/addListVaccinated/{{$vaccProfiling->id}}" class="col-lg-8 col-md-8 col-10 mx-auto"  >
              @csrf
              
            <div class="form-row">
                  <div class="form-group col-sm-5">
                          <label>Name</label>
                          <input readonly name="dose" class="form-control" value="{{$vaccProfiling->name}}">
                  </div>
                  <div class="form-group col-sm-3">
                    <label>Age</label>
                    <input readonly name="dose" class="form-control" value="{{$vaccProfiling->age}}">
                  </div>

                  <div class="form-group col-sm-4">
                    <label>Birthdate</label>
                    <input readonly name="dose" class="form-control" value="{{$vaccProfiling->birthdate}}">
                  </div>
            </div>
              <div class="form-row">
                  <div class="form-group col-sm-6">
                      <label>Status</label>
                      <input readonly name="dose" class="form-control" value="{{$vaccProfiling->dose}}">
                  </div>
  
                  <div class="form-group col-sm-6">
                      <label>Type of Vaccine</label>
                      <input readonly  name="vaccine_type" class="form-control" value="{{$vaccProfiling->vaccine_type}}">
                  </div>
  

             </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label>Vaccination Address</label>
                    <input readonly  name="address" class="form-control" value="{{$vaccProfiling->address}}">
                </div>
                <div class="form-group col-md-6">
                    <label>Date of First Dose</label>
                    <input readonly name="first_dose" class="form-control" value="{{$vaccProfiling->date_first}}">
                </div>
          </div>

            <button type="submit" class="btn btn-primary" >Add to List</button>
          </form>
          @endif

          @if($vaccProfiling->dose=='Fully Vaccinated')
                  <label class="labelImage" style="font-weight: 800">Vaccination Card</label>
                  <a href="#showImage" class="show" data-toggle="modal"><img class="previewww" id="preview" src="{{$vaccProfiling->vaccine_image? asset ('storage/' .$vaccProfiling->vaccine_image) : asset('/storage/no/-image.png')}}" alt="" style="padding-bottom: 20px" /></a>
            <form  method="POST" action="/addListVaccinated/{{$vaccProfiling->id}}" class="col-lg-8 col-md-8 col-10 mx-auto"  >
                @csrf
                <div class="form-row">
                  <div class="form-group col-sm-5">
                          <label>Name</label>
                          <input readonly name="dose" class="form-control" value="{{$vaccProfiling->name}}">
                  </div>
                  <div class="form-group col-sm-3">
                    <label>Age</label>
                    <input readonly name="dose" class="form-control" value="{{$vaccProfiling->age}}">
                  </div>

                  <div class="form-group col-sm-4">
                    <label>Birthdate</label>
                    <input readonly name="dose" class="form-control" value="{{$vaccProfiling->birthdate}}">
                  </div>
            </div>
              <div class="form-row">

                    <div class="form-group col-sm-4">
                        <label>Status</label>
                        <input readonly name="dose" class="form-control" value="{{$vaccProfiling->dose}}">
                    </div>
    
                    <div class="form-group col-sm-4">
                        <label>Type of Vaccine</label>
                        <input readonly  name="vaccine_type" class="form-control" value="{{$vaccProfiling->vaccine_type}}">
                    </div>
    
                    <div class="form-group col-sm-4">
                        <label>Vaccination Address</label>
                        <input readonly  name="address" class="form-control" value="{{$vaccProfiling->address}}">
                    </div>
               </div>
              <div class="form-row">
    
                  <div class="form-group col-md-6">
                    <label>Date of First Dose</label>
                    <input readonly name="first_dose" class="form-control" id="inputAddress5" value="{{$vaccProfiling->date_first}}">
                  </div>
                  <div class="form-group col-md-6">
                      <label>Date of Second Dose</label>
                      <input readonly  name="date_first" class="form-control" id="inputAddress6" value="{{$vaccProfiling->date_second}}">
                  </div>
    
            </div>

              <button type="submit" class="btn btn-primary">Add to List</button>
            </form>
            @endif
    

      </div> <!-- /. card-body -->
    </div> <!-- /. card -->
  </div> <!-- /. col -->
</div> <!-- /. end-section -->

<div id="showImage" class="modal fade">
  <div class="modal-dialog">
      <div class="modal-content">
          <form>
              <div class="modal-header">						
                  <h4 class="modal-title">View Vaccination Card</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>


              <div class="modal-body">					
                <div id="image-show-area">
                  <img class="id-birth" src="{{$vaccProfiling->vaccine_image ? asset ('storage/' .$vaccProfiling->vaccine_image) : asset('/storage/images/-image.png')}}" alt=""  />
                </div>
              </div>
              <div class="modal-footer">
                  <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" >
              </div>

          </form>
      </div>
  </div>
</div>
@endsection