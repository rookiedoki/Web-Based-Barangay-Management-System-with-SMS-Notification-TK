@extends('layout.dashboard-layout')
@section('content')
<div class="row">

  <div class="col-md-12">
 
    <div class="card shadow mb-4">
      <div class="card-header">
        
        <h2 style="padding-left: 20px; padding-top: 20px">RESIDENT VACCINATION PROFILE</h2>
      </div>
      <div class="card-body">
        <label class="labelImage" style="font-weight: 800">Vaccination Card</label>
        <a href="#showImage" class="show" data-toggle="modal"><img class="previewww" id="preview" src="{{$vaccProfiling->vaccine_image? asset ('storage/' .$vaccProfiling->vaccine_image) : asset('/storage/no/-image.png')}}" alt="" style="padding-bottom: 20px" /></a>
        <form  method="POST" action="/addListVaccinated/{{$vaccProfiling->id}}" class="col-lg-8 col-md-8 col-10 mx-auto"  >
            @csrf
          <div class="form-row">
                    <input type="hidden"  name="name" value="{{ ucfirst(auth()->user()->adminResidents->first_name)}}, {{ucfirst(auth()->user()->adminResidents->last_name)}}  {{ucfirst(substr(auth()->user()->adminResidents->middle_name, 0,1)) }}.">
                      <input type="hidden"  name="age" value="{{auth()->user()->adminResidents->age}}">
                      <input type="hidden"  name="birthdate" value="{{auth()->user()->adminResidents->birthdate}}">
                      <input type="hidden"  name="status" value="0">
              <div class="form-group col-md-4">
                    <label for="inputEmail4">Type of Vaccine</label>
                    <input readonly  name="vaccine_type" class="form-control" id="inputAddress5" value="{{$vaccProfiling->vaccine_type}}">
                  @Error('vaccine_type')
                  <p class="text-danger text-xl mt-2">{{$message}}</p>
                   @enderror
                </div>
                    <div class="form-group col-md-9">
                      <label for="inputPassword4">Vaccination Address</label>
                      <input readonly  name="address" class="form-control" id="inputPassword5" value="{{$vaccProfiling->address}}">
                      @Error('address')
                      <p class="text-danger text-xs mt-1">{{$message}}</p>
                       @enderror
                    </div>
          </div>
          <div class="form-row">

              <div class="form-group col-md-6">
                <label for="inputAddress">First Dose</label>
                <input readonly name="first_dose" class="form-control" id="inputAddress5" value="{{$vaccProfiling->first_dose}}">
                @Error('first_dose')
                <p class="text-danger text-xs mt-1">{{$message}}</p>
                 @enderror
              </div>

                  <div class="form-group col-md-6">
                    <label for="inputAddress2">Date of First Dose</label>
                    <input readonly  name="date_first" class="form-control" id="inputAddress6" value="{{$vaccProfiling->date_first}}">
                    @Error('date_first')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @enderror
                  </div>

        </div>
          <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="inputCity">Second Dose</label>
                  <input readonly  name="second_dose" class="form-control" value="{{$vaccProfiling->second_dose}}">

                  @Error('second_dose')
                  <p class="text-red-500 text-xs mt-1">{{$message}}</p>
               @enderror
                </div>


           <div class="form-group col-md-3">
              <label for="inputZip">Date of Vaccination</label>
              <input readonly  name="date_second" class="form-control" value="{{$vaccProfiling->date_second}}">
              @Error('date_second')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>


                <div class="form-group col-md-3">
                  <label for="inputZip">Booster</label>
                  <input readonly  name="booster" class="form-control" value="{{$vaccProfiling->booster}}">

                  @Error('booster')
                  <p class="text-red-500 text-xs mt-1">{{$message}}</p>
               @enderror

                </div>

                  <div class="form-group col-md-3">
                    <label for="inputZip">Date of Vaccination</label>
                    <input readonly  name="booster_date" class="form-control" value="{{$vaccProfiling->booster_date}}">

                    @Error('booster_date')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                  @enderror
                  </div>

            <div class="form-group">

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
                  <h4 class="modal-title">View Vaccination Card</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>


              <div class="modal-body">					
                <div id="image-show-area">
                  <img class="id-birth" src="{{$vaccProfiling->vaccine_image ? asset ('storage/' .$vaccProfiling->vaccine_image) : asset('/storage/images/-image.png')}}" alt=""  />
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