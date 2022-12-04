@include('partials.header')
<header id="header" class="fixed-top " style="background-color:rgb(12, 12, 209)">
  <div class="container d-flex align-items-center">

    <a href="index.html" class="logo me-auto">
      @foreach($setting as $settings)
      <img src="{{$settings->barangay_logo ? asset ('storage/' .$settings->barangay_logo) : asset('/storage/no/-image.png')}}" class="img-fluid">
      @endforeach
    </a>
    {{-- <h1 class="logo me-auto"><a href="index.html">WBMS | Paloyon Oriental</a></h1> --}}
    <!-- Uncomment below if you prefer to use an image logo -->

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
        <li><a class="nav-link scrollto" href="#about">About</a></li>
        <li><a class="nav-link scrollto" href="#services">Services</a></li>
        <li><a class="nav-link   scrollto" href="#portfolio">Portfolio</a></li>
        <li><a class="nav-link scrollto" href="#team">Officials</a></li>
        <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
              <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
              </ul>
            </li>
            <li><a href="#">Drop Down 2</a></li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
          </ul>
        </li>
        <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        <li class="dropdown"><a href="#"> <img src="{{auth()->user()->adminResidents->resident_image ? asset ('storage/' .auth()->user()->adminResidents->resident_image ) : asset('/storage/no/-image.png')}}" alt=""  class="authimg"></a>
          {{-- <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <img src="{{auth()->user()->adminResidents->resident_image ? asset ('storage/' .auth()->user()->adminResidents->resident_image ) : asset('/storage/no/-image.png')}}" alt=""  style="width:35px">
          </a> --}}
          <ul>
              <li><a class="dropdown-item" href="/myProfile">My Profile</a></li>
              <li><a class="dropdown-item" href="/userProfiling">Profiling</a></li>
              <li><form action="/logout" method="POST">
                  @csrf
               <a> <button class="dropdown-item" type="submit">Logout</button></a>
                </form></li>
          </ul>
          </div>
        {{-- <li><a class="getstarted scrollto" href="#about">Get Started</a></li> --}}
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
    <!-- .navbar -->

  </div>
</header><!-- End Header -->
<!-- component -->

<style>
  :root {
      --main-color: #4a76a8;
  }

  .bg-main-color {
      background-color: var(--main-color);
  }

  .text-main-color {
      color: var(--main-color);
  }

  .border-main-color {
      border-color: var(--main-color);
  }
</style>
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>



<div class="bg-gray-100">

  <!-- End of Navbar -->
  <form  method="POST" enctype="multipart/form-data"  action="/updateProfile" class="col-lg-12 col-md-8 col-10 mx-auto"  >
    @csrf
    @method('PUT')
  <div class="container mx-auto my-5 p-5">
      <div class="md:flex no-wrap md:-mx-2 ">
          <!-- Left Side -->
          <div class="w-full md:w-3/12 md:mx-2">
              <!-- Profile Card -->
              <div class="bg-white p-3  ">
                  <div class="image overflow-hidden center-block">
                    <img class="preview" id="preview" src="{{$profile->resident_image ? asset ('storage/' .$profile->resident_image) : asset('/storage/no/-image.png')}}" style="width:280px; height:250px" />
                    <input type="file"  name="resident_image" id="resident_image2" value="{{$profile->resident_image}}" >
                    <input type="hidden"  name="old_resident_image" id="old_resident_image" value="{{$profile->resident_image}}" >
                    @Error('resident_image')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                   @enderror 
                  </div>
              </div>
              <!-- End of profile card -->
              <div class="my-4"></div>
              <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
          </div>
          <!-- Right Side -->
          <div class="w-full md:w-9/12 mx-2 h-64">
              <!-- Profile tab -->
              <!-- About Section -->
              <div class="bg-white p-3 shadow-sm rounded-sm">

                <div class="mx-auto text-center my-4">
              
                    @if(session()->has('message'))
                    <div class="alert" id="alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{session()->get('message')}}
        
                  </div>
                  @endif
                  </div>
<body style="margin: 0 0 100px;">
    <div class="wrapper vh-1000">
        <div class="row align-items-center h-100">
<div class="h3 text-center ">Edit Profile</div>
                       
                      <div class="form-row">
                        <div class="col-md-4 form-group">
                          <label>First Name</label>
                          <input type="text" name="first_name" class="form-control" value="{{$profile->first_name}}">
                          @Error('first_name')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                         @enderror
                        </div>
                        <div class="col-md-4 form-group">
                          <label>Middle Name</label>
                          <input type="text"  name="middle_name" class="form-control" value="{{$profile->middle_name}}">
                          @Error('middle_name')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                         @enderror
                        </div>
              
                        <div class="col-md-4 form-group">
                          <label>Last Name</label>
                          <input type="text"  name="last_name" class="form-control" value="{{$profile->last_name}}">
                          @Error('last_name')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                         @enderror
                        </div>
              
                     </div>
              
                     <div class="form-row">
                      <div class="form-group col-sm-4">
                        <label>Nickname</label>
                        <input type="text"  name="nickname" class="form-control" value="{{$profile->nickname}}">
                        @Error('nickname')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                         @enderror
                      </div>
              
                      <div class="form-group col-sm-4">
                        <label>Place of Birth</label>
                        <input type="text" name="place_of_birth" class="form-control" value="{{$profile->place_of_birth}}">
                        @Error('place_of_birth')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                         @enderror
                      </div>
              
                      <div class="form-group col-sm-4">
                        <label>Birthdate</label>
                        <input type="date" name="birthdate" class="form-control" value="{{$profile->birthdate}}">
                        @Error('birthdate')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                         @enderror
                      </div>
              
                   </div>
              
                   <div class="form-row">
                    <div class="form-group col-sm-4">
                      <label>Age</label>
                      <input type="text" name="age" class="form-control" value="{{$profile->age}}">
                      @Error('age')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror
                    </div>
              
                    <div class="form-group col-sm-4">
                      <label>Civil Status</label>
                      <select class="form-control" name="civil_status" value="{{$profile->civil_status}}" required autocomplete="voter_status">
                        <option value="Single"{{$profile->civil_status=="Single" ? 'selected' :''}}>Single</option>
                        <option value="Married"{{$profile->civil_status=="Married" ? 'selected' :''}}>Married</option>
                        <option value="Widowed"{{$profile->civil_status=="Widowed" ? 'selected' :''}}>Widowed</option>
                        <option value="Divorced"{{$profile->civil_status=="Divorced" ? 'selected' :''}}>Divorced</option>
                        <option value="Separated"{{$profile->civil_status=="Separated" ? 'selected' :''}}>Separated</option>
                        <option value="Annuled"{{$profile->civil_status=="Annuled" ? 'selected' :''}}>Annuled</option>
                        <option value="Live-In"{{$profile->civil_status=="Live-In" ? 'selected' :''}}>Live-In</option>
                    </select>
                      @Error('civil_status')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                         @enderror
                    </div>
              
                    <div class="form-group col-sm-4">
                      <label>Gender</label>
                      <select class="form-control" id="gender"name="gender" required autocomplete="gender">
                        <option value="Male"{{$profile->gender=="Male" ? 'selected' :''}}>Male</option>
                        <option value="Female"{{$profile->gender=="Female" ? 'selected' :''}}>Female</option>
                    </select>
                    @Error('gender')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                         @enderror
                    </div>
              
                 </div>
                 
                 <div class="form-row">
                  <div class="form-group col-sm-4">
                    <label>Street</label>
                    <input type="text"  name="street" class="form-control" value="{{$profile->street}}">
                    @Error('street')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                         @enderror
                  </div>
                  <div class="form-group col-sm-4">
                    <label>House No.</label>
                    <input type="text"  name='house_no' class="form-control" value="{{$profile->house_no}}">
                    @Error('house_no')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                         @enderror
                  </div>
              
                  <div class="form-group col-sm-4">
                    <label>Voter Status</label>
                    <select class="form-control" id="voter_status"name="voter_status" required autocomplete="voter_status">
                      <option value="Voter"{{$profile->voter_status=="Voter" ? 'selected' :''}}>Voter</option>
                      <option value="Non Voter"{{$profile->voter_status=="Non Voter" ? 'selected' :''}}>Non Voter</option>
                  </select>
                  @Error('voter_status')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                         @enderror
                  </div>

                </div>

                <div class="form-row">
                  <div class="form-group col-sm-4">
                    <label>Citizenship</label>
                    <input type="text"  name="citizenship" class="form-control" value="{{$profile->citizenship}}">
                    @Error('citizenship')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                         @enderror
                  </div>
              
                  <div class="form-group col-sm-4">
                    <label>Contact Number</label>
                    <input type="text"  name="phone_number" class="form-control" value="{{$profile->phone_number}}">
                    @Error('contact_number')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                         @enderror
                  </div>
              
                  <div class="form-group col-sm-4">
                    <label>Occupation</label>
                    <input type="text" id="occupation"  name="occupation" class="form-control" value="{{$profile->occupation}}">
                    @Error('occupation')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                         @enderror
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-sm-6">
                    <label>Work Status</label>
                    <select class="form-control" name="work_status" value="{{old('work_status')}}" required autocomplete="work_status" value="{{old('work_status')}}">
                      <option value="Employed"{{$profile->work_status=="Employed" ? 'selected' :''}}>Employed</option>
                      <option value="Unemployed"{{$profile->work_status=="Unemployed" ? 'selected' :''}}>Unemployed</option>
                      <option value="Self-Employed"{{$profile->work_status=="Self-Employed" ? 'selected' :''}}>Self Employed</option>
                      <option value="N/A"{{$profile->work_status=="N/A" ? 'selected' :''}}>N/A</option>
                   </select>
                    @Error('work_status')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                         @enderror
                  </div>
    
                    <div class="form-group col-sm-6">
                      <label>Email Address</label>
                      <input type="text" name="email" class="form-control" value="{{$profile->email}}">
                      @Error('email')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                           @enderror
                    </div>


                        <input type="hidden"  name="password" class="form-control" value="{{$profile->password}}">
                </div>
                      </form>
              
                    </div>
                </div>

        </form> 

    </div>
</body> 


              </div>
              <!-- End of about section -->

              <div class="my-4"></div>

          </div>
      </div>
  </div>
</div>


