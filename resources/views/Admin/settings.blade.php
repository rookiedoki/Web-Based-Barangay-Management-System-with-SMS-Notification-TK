@extends('layout.dashboard-layout')

@section('content')

<link rel="stylesheet" href="{{url('assets/css/settings.css')}}">
<div class="col-md-12 mb-4">
    <h3>SETTINGS</h3>
    <div class="card shadow">
      <div class="card-body">
        <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-system-tab" data-toggle="pill" href="#pills-system" role="tab" aria-controls="pills-system" aria-selected="false">System</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Barangay Information</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Mission,Vision and Goal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">About</a>
          </li>
        </ul>

        @foreach($setting as $settings)
        <form action="/settings/{{$settings->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="tab-content mb-1" id="pills-tabContent">
        {{-- System --}}
          <div class="tab-pane fade show active" id="pills-system" role="tabpanel" aria-labelledby="pills-system-tab">
            <h3 class="text-center" style="padding-top:15px">SYSTEM INFORMATION</h3>
              <div class="row">
                  <div class="col-sm-7">
                    <div class="profile-head" style="padding-top:60px">
                      <textarea  style="font-size: 30px" type="text" class="form-control" name="system_title"  required autocomplete="system_title" >{{$settings->system_title}}</textarea></h1>
                      <h6 style="font-size: 20px; text-align:center"> System Title</h6>
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="profile-img">
                      <img src="{{$settings->system_logo ? asset ('storage/' .$settings->system_logo) : asset('/storage/no/-image.png')}}" alt="" id="prvieww" class="img-fluid" style="width:500px; height:250px;"/>
                        <div class="file btn btn-lg btn-primary">System Image
                          <input type="file" name="system_logo" id="system_logo" value="{{$settings->system_logo}}"/>
                          <input type="hidden" name="old_system_logo" id="old_system_logo" value="{{$settings->system_logo}}"/>
                        </div>
                    </div>
                  </div>
              </div>
          </div>

          {{-- barangay information --}}
          <div class="tab-pane fade " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <h3 class="text-center" style="padding-top:15px">BARANGAY INFORMATION</h3>
            <div class="row">
              <div class="col-sm-4">
                <div class="profile-img">
                  <img src="{{$settings->barangay_logo ? asset ('storage/' .$settings->barangay_logo) : asset('/storage/no/-image.png')}}" alt="" id="prview" style="width: 150px; height:150px"/>
                    <div class="file btn btn-lg btn-primary">Barangay Logo
                      <input type="file" name="barangay_logo" id="barangay_logo" value="{{$settings->barangay_logo}}"/>
                      <input type="hidden" name="old_brgy_logo" id="old_brgy_logo" value="{{$settings->barangay_logo}}"/>
                      @Error('brgy_logo')
                       <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror
                    </div>
                </div>
                <div class="profile-img">
                    <img src="{{$settings->barangay_logo2 ? asset ('storage/' .$settings->barangay_logo2) : asset('/storage/no/-image.png')}}" alt="" id="prview" style="width: 150px; height:150px"/>
                      <div class="file btn btn-lg btn-primary">Barangay Logo
                        <input type="file" name="barangay_logo2" id="barangay_logo2" value="{{$settings->barangay_logo2}}"/>
                        <input type="hidden" name="old_brgy_logo2" id="old_brgy_logo2" value="{{$settings->barangay_logo2}}"/>
                        @Error('brgy_logo2')
                         <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>
                  </div>
              </div>

              <div class="col-sm-7">
                <div class="profile-head" style="padding-top:110px">
                  <input style="font-size: 23px" type="text" class="form-control" name="barangay_name"  value="{{$settings->barangay_name}}" >
                    <h6 style="font-size: 15px; text-align:center">Name of the Barangay</h6>
                    @Error('brgy_name')
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="profile-head" >
                    <input style="font-size: 23px" type="text" class="form-control" name="brgy_location"  value="{{$settings->brgy_location}}">
                    <h6 style="font-size: 15px; text-align:center"> Location</h6>
                </div>
                <div class="profile-head" >
                    <input style="font-size: 23px" type="text" class="form-control" name="brgy_email"  value="{{$settings->brgy_email}}">
                    <h6 style="font-size: 15px; text-align:center"> Email</h6>
                </div>
              </div>
            </div>
          </div>

          {{-- Vision Mission Goal --}}
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <h3 style="padding-top:15px" class="text-center">VISION, MISSION AND GOAL</h3>
              <div class="form-group ">
                <h5>Description</h5>
                <textarea class="form-control" type="text" name="description" value="{{$settings->description}}">{{$settings->description}}</textarea>
              </div>
              <div class="form-group ">
                <h5>Mission</h5>
                <textarea class="form-control" type="text" name="mission" >{{$settings->mission}}</textarea>
              </div>
              <div class="form-group mb-3">
                <h5>Vision</h5>
                <textarea class="form-control" id="example-date" type="text" name="vission">{{$settings->vission}}</textarea>
              </div>
              <div class="form-group mb-3">
                <h5>Goal</h5>
                <textarea class="form-control" id="example-date" type="text" name="goal">{{$settings->goal}}</textarea>
              </div>
          </div>
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <h3 class="text-center" style="padding-top:15px">ABOUT US</h3>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group ">
                  <textarea class="form-control"  rows="5" cols="60" id="example-date" type="text" name="about_section1">{{$settings->about_section1}}</textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group ">
                  <textarea class="form-control"  rows="5" cols="60" id="example-date" type="text" name="about_section2">{{$settings->about_section2}}</textarea>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        <div class="col-md-11">
          <button type="submit" class="btn btn-primary float-right" style="padding-left: 30px; padding-right: 30px; ">Save</button>
        </div>
      </div>
    </div>
  </div>
</div>

    <script>
    barangay_logo.onchange = evt => {
        const [file] = barangay_logo.files
        if (file) {
        prview.style.visibility = 'visible';

        prview.src = URL.createObjectURL(file)
        }
    }
    </script>

    <script>
    system_logo.onchange = evt => {
      const [file] = system_logo.files
      if (file) {
        prvieww.style.visibility = 'visible';

        prvieww.src = URL.createObjectURL(file)
      }
    }
    </script>
@endsection
