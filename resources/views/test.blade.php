@extends('layout.dashboard-layout')
@section('content')
  <div class="col-md-12 mb-4">
    <div class="card shadow">
      <div class="card-body">
        
        <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
             <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">System</a>
        </li>
          <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Barangay Information</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Mission,Vission and Goal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">About</a>
          </li>
        </ul>
        <div class="tab-content mb-1" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"> 
            <h3 class="text-center">Barangay Information</h3>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="profile-img">
                            <img src="{{$settings->barangay_logo ? asset ('storage/' .$settings->barangay_logo) : asset('/storage/no/-image.png')}}" alt="" id="prview"/>
                              <div class="file btn btn-lg btn-primary">
                                Barangay Logo
                                <input type="file" name="barangay_logo" id="barangay_logo" value="{{$settings->barangay_logo}}"/>
                                <input type="hidden" name="old_brgy_logo" id="old_brgy_logo" value="{{$settings->barangay_logo}}"/>
                            
                                @Error('brgy_logo')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="profile-head" style="padding-top:110px">
                            <input type="text" class="form-control" name="barangay_name"  value="{{$settings->barangay_name}}" >
                                    <h6>
                                        Name of the Barangay
                                    </h6> 
                        @Error('brgy_name')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                          @enderror
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="profile-head" >
                            <input type="text" class="form-control" name="brgy_location"  value="{{$settings->brgy_location}}">
                            <h6>Location</h6>
                            
                         </div>
                        </div>
                    <div class="col-sm-6">
                        <div class="profile-head" >
                            <input type="text" class="form-control" name="brgy_email"  value="{{$settings->brgy_email}}">
                            <h6>Email</h6>
                </div>
            </div>
                <div class="col-sm-6">
        </div>
        </div>    
        </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"> 2Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. </div>
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"> 3Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. </div>
        </div>
      </div>
    </div>
  </div>
@endsection
  