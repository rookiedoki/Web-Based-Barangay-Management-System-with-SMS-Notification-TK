@include('partials.header')
<body>

  <!-- ======= Header ======= -->
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
          <li><a class="nav-link scrollto active" href="/home" style="text-decoration:none">Home</a></li>
          <li><a class="nav-link scrollto" href="/userProfiling" style="text-decoration:none">Vaccination</a></li>
          <li><a class="nav-link scrollto" href="/pwd" style="text-decoration:none">PWDs</a></li>
          <li><a class="nav-link   scrollto" href="/senior" style="text-decoration:none">Senior Citizen</a></li>
          <li><a class="nav-link scrollto" href="/pregnant" style="text-decoration:none">Pregnant</a></li>

          <li class="dropdown"><a href="#"> <img src="{{auth()->user()->adminResidents->resident_image ? asset ('storage/' .auth()->user()->adminResidents->resident_image ) : asset('/storage/no/-image.png')}}" alt=""  class="authimg"></a>
            {{-- <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <img src="{{auth()->user()->adminResidents->resident_image ? asset ('storage/' .auth()->user()->adminResidents->resident_image ) : asset('/storage/no/-image.png')}}" alt=""  style="width:35px">
            </a> --}}
            <ul>
              <li><a class="dropdown-item" href="/myProfile" style="text-decoration:none">My Profile</a></li>
              <li><a class="dropdown-item" href="/userProfiling" style="text-decoration:none">Profiling</a></li>
              <li><form action="/logout" method="POST">
                  @csrf
               <a> <button class="dropdown-item" type="submit" style="text-decoration:none">Logout</button></a>
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
<head>
  <title>Profiling</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

  

<div class="container">

<br><br><br><br><br><br>
@if(session()->has('message'))
<div class="alert alert-primary" id="alert">
<button type="button" class="close" data-dismiss="alert">x</button>
{{session()->get('message')}}

</div>
@endif

   {{-- ------------------------------Vaccinated-------------------------------------------  --}}

   <h3>Pregnant Women</h3>
   <p>Reminder: Do not fillup this form if not applicable.</p>    
   <div class="row">
     <div class="col-md-12">
       <div class="card shadow mb-4">
         <div class="card-header">
           

         </div>
         <div class="card-body">
           <form action="/storePregnant" method="POST" enctype="multipart/form-data">
             @csrf
             <div class="form-row">
                       <input type="hidden"  name="name" value="{{ ucfirst(auth()->user()->adminResidents->last_name)}}, {{ucfirst(auth()->user()->adminResidents->first_name)}}  {{ucfirst(auth()->user()->adminResidents->middle_name)}}">
                       <input type="hidden"  name="age" value="{{auth()->user()->adminResidents->age}}">  
                       <input type="hidden"  name="birthdate" value="{{auth()->user()->adminResidents->birthdate}}">

                 <div class="form-group col-md-6">
                         <label>Last Menstrual Period(LMP)</label>
                         <input type="date"  name="LMP" class="form-control" >
                         @Error('LMP')
                         <p class="text-danger text-xs mt-1">{{$message}}</p>
                          @enderror
                     </div>
     
                     <div class="form-group col-md-6">
                       <label>Estimated Date of Confinement(EDC)</label>
                       <input type="date"  name="EDC" class="form-control" >

                       @Error('EDC')
                       <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                     @enderror
                     </div>

                     <div class="form-group col-md-12">
                      <label>Weight</label>
                      <input type="text"  name="weight" class="form-control" placeholder="Please input in kilograms">

                      @Error('weight')
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                    </div>
           </div>
                 <button type="submit" class="btn btn-primary">Save</button>
           </form>
         </div> <!-- /. card-body -->
       </div> <!-- /. card -->
     </div> <!-- /. col -->
   </div> <!-- /. end-section -->
  </div>
</body>
</html>
<script type="text/javascript">
    
  $("document").ready(function()

  {
    setTimeout(function()
      {
        $("div.alert").remove();
      },3000);
  });
  </script>