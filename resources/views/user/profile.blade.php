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
        <li><a class="nav-link scrollto active" href="/home">Home</a></li>
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

  <div class="container mx-auto my-5 p-5">
      <div class="md:flex no-wrap md:-mx-2 ">
          <!-- Left Side -->
          <div class="w-full md:w-3/12 md:mx-2">
              <!-- Profile Card -->
              <div class="bg-white p-3  ">
                  <div class="image overflow-hidden center-block">
                   <img src="{{auth()->user()->adminResidents->resident_image ? asset ('storage/' .auth()->user()->adminResidents->resident_image ) : asset('/storage/no/-image.png')}}" style="width:280px; height:250px">
                  </div>
                  <h1 class="text-gray-900 font-bold text-xl leading-8 my-1 text-center">{{ ucfirst($profile->last_name)}}, {{ucfirst($profile->first_name)}}  {{ucfirst(substr($profile->last_name, 0,1)) }}.</h1>
              </div>
              <!-- End of profile card -->
              <div class="my-4"></div>
              <a href="/editProfile" class="btn btn-success" ><i class="fas fa-pencil" ></i> <span>Edit Profile</span></a>
          </div>
          <!-- Right Side -->
          <div class="w-full md:w-9/12 mx-2 h-64">
              <!-- Profile tab -->
              <!-- About Section -->
              <div class="bg-white p-3 shadow-sm rounded-sm">
                  <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                      <span clas="text-green-500">
                          <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                              stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                          </svg>
                      </span>
                      <span class="tracking-wide">Basic Information</span>
                  </div>
                  <div class="text-gray-700">
                      <div class="grid md:grid-cols-2 text-sm">
                          <div class="grid grid-cols-2">
                              <div class="px-4 py-2 font-semibold">First Name</div>
                              <div class="px-4 py-2">{{$profile->first_name}}</div>
                          </div>
                          <div class="grid grid-cols-2">
                              <div class="px-4 py-2 font-semibold">Gender</div>
                              <div class="px-4 py-2">{{$profile->gender}}</div>
                          </div>
                          <div class="grid grid-cols-2">
                              <div class="px-4 py-2 font-semibold">Middle Name</div>
                              <div class="px-4 py-2">{{$profile->middle_name}}</div>
                          </div>
                          <div class="grid grid-cols-2">
                              <div class="px-4 py-2 font-semibold">Age</div>
                              <div class="px-4 py-2">{{$profile->age}}</div>
                          </div>
                          <div class="grid grid-cols-2">
                              <div class="px-4 py-2 font-semibold">Last Name</div>
                              <div class="px-4 py-2">{{$profile->last_name}}</div>
                          </div>
                          <div class="grid grid-cols-2">
                              <div class="px-4 py-2 font-semibold">Birthday</div>
                              <div class="px-4 py-2">{{$profile->birthdate}}</div>
                          </div>
                          <div class="grid grid-cols-2">
                              <div class="px-4 py-2 font-semibold">Nickname</div>
                              <div class="px-4 py-2">
                                  <a class="text-blue-800" href="mailto:jane@example.com">jane@example.com</a>
                              </div>
                          </div>
                          <div class="grid grid-cols-2">
                              <div class="px-4 py-2 font-semibold">Civil Status</div>
                              <div class="px-4 py-2">{{$profile->civil_status}}</div>
                          </div>
                          <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">Work Status</div>
                            <div class="px-4 py-2">{{$profile->occupation}}</div>
                        </div>
                        <div class="grid grid-cols-2">
                          <div class="px-4 py-2 font-semibold">Occupation</div>
                          <div class="px-4 py-2">{{$profile->occupation}}</div>
                      </div>
                      </div>
                  </div>

              </div>
              <!-- End of about section -->

              <div class="my-4"></div>

              <!-- Experience and education -->
              <div class="bg-white p-3 shadow-sm rounded-sm">

                  <div class="grid grid-cols-2">
                      <div>
                          <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                              <span clas="text-green-500">
                                  <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                      stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                  </svg>
                              </span>
                              <span class="tracking-wide">Contact Information</span>
                          </div>
                          <ul class="list-inside space-y-2">
                              <li>
                                  <div class="text-teal-600">Email Address</div>
                                  <div class="text-gray-500 text-xs">{{$profile->email}}</div>
                              </li>
                              <li>
                                  <div class="text-teal-600">Phone Number</div>
                                  <div class="text-gray-500 text-xs">{{$profile->phone_number}}</div>
                              </li>
                          </ul>
                      </div>
                      <div>
                          <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                            <i class="fas fa-home"></i>
                              <span class="tracking-wide">House Information</span>
                          </div>
                          <ul class="list-inside space-y-2">
                              <li>
                                  <div class="text-teal-600">House Number</div>
                                  <div class="text-gray-500 text-xs">{{$profile->house_no}}</div>
                              </li>
                              <li>
                                  <div class="text-teal-600">Street</div>
                                  <div class="text-gray-500 text-xs">{{$profile->street}}</div>
                              </li>
                          </ul>
                      </div>
                  </div>
                  <!-- End of Experience and education grid -->
              </div>
              <!-- End of profile tab -->
          </div>
      </div>
  </div>
</div>
