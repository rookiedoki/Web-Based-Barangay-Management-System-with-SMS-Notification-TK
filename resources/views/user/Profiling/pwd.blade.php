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

    <h3>PWDs</h3>
    <p>Reminder: Do not fillup this form if not applicable.</p>    

    <div class="row">
      <div class="col-md-12">
        <div class="card shadow mb-4">
          <div class="card-header">
            

          </div>
          <div class="card-body">
            <form action="/storePWD" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="h4 text-center">TYPE OF DISABILITY </div>
              <div class="form-row">
                        <input type="hidden"  name="name" value="{{ ucfirst(auth()->user()->adminResidents->last_name)}}, {{ucfirst(auth()->user()->adminResidents->first_name)}}  {{ucfirst(substr(auth()->user()->adminResidents->middle_name, 0,1)) }}.">
                          <input type="hidden"  name="sex" value="{{auth()->user()->adminResidents->age}}">
                          <input type="hidden"  name="civil_status" value="{{auth()->user()->adminResidents->civil_status}}">
                          <input type="hidden"  name="birthdate" value="{{auth()->user()->adminResidents->birthdate}}">
                          <input type="hidden"  name="status" value="0">
                          
                        <div class="form-group col-md-4">
                          <input type="checkbox" value="Deaf or Hard of Hearing" name="type_disability[]" >
                          <label for="inputPassword4">Deaf or Hard of Hearing</label>
                         
                        </div>
                <div class="form-group col-md-4">
                  <input type="checkbox" value="Intellectual Disability" name="type_disability[]" >
                  <label for="inputPassword4">Intellectual Disability</label>
                </div>

                <div class="form-group col-md-4">
                  <input type="checkbox" value="Learning Disability" name="type_disability[]" >
                  <label for="inputPassword4">Learning Disability</label>

                </div>
            </div>


              <div class="form-row">
                <div class="form-group col-md-4">
                  <input type="checkbox" value="Mental Disability" name="type_disability[]" >
                  <label for="inputPassword4">Mental Disability</label>
                </div>


                <div class="form-group col-md-4">
                  <input type="checkbox" value="Physical Disability (Orthopedic)" name="type_disability[]" >
                  <label for="inputPassword4">Physical Disability (Orthopedic)</label>
                </div>


                <div class="form-group col-md-4">
                  <input type="checkbox" value="Psychosocial Disability" name="type_disability[]" >
                  <label for="inputPassword4">Psychosocial Disability</label>
                </div>

                <div class="form-group col-md-4">
                  <input type="checkbox" value="Speech and Language Impairment" name="type_disability[]" >
                  <label for="inputPassword4">Speech and Language Impairment</label>
                </div>

                <div class="form-group col-md-4">
                  <input type="checkbox" value="Visual Disability" name="type_disability[]" >
                  <label for="inputPassword4">Visual Disability</label>
                </div>

                <div class="form-group col-md-4">
                  <input type="checkbox" value="Cancer (RA11215)" name="type_disability[]" >
                  <label for="inputPassword4">Cancer (RA11215) 
                  </label>
                </div>

                <div class="form-group col-md-12">
                  <input type="checkbox" value="Rare Disease (RA10747)" name="type_disability[]" >
                  <label for="inputPassword4">Rare Disease (RA10747)</label>

                </div>
              </div>

                <div class="h4 text-center">CAUSE OF DISABILITY </div>
              <div class="form-row">
              </div>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <input type="checkbox" value="Congenital / Inborn" name="cause_disablity[]" >
                  <label for="inputPassword4">Congenital / Inborn</label>

                </div>


                <div class="form-group col-md-3">
                  <input type="checkbox" value="Autism" name="cause_disablity[]" >
                  <label for="inputPassword4">Autism</label>

                </div>


                <div class="form-group col-md-3">
                  <input type="checkbox" value="ADHD" name="cause_disablity[]" >
                  <label for="inputPassword4">ADHD</label>

                </div>

                <div class="form-group col-md-3">
                  <input type="checkbox" value="Cerebral Palsy" name="cause_disablity[]" >
                  <label for="inputPassword4">Cerebral Palsy
                  </label>

                </div>

                <div class="form-group col-md-3">
                  <input type="checkbox" value="Down Syndrome" name="cause_disablity[]" >
                  <label for="inputPassword4">Down Syndrome

                  </label>

                </div>

                <div class="form-group col-md-3">
                  <input type="checkbox" value="Chronic Illness" name="cause_disablity[]" >
                  <label for="inputPassword4">Chronic Illness
                  </label>

                </div>

                <div class="form-group col-md-3">
                  <input type="checkbox" value="Cerebral Palsy" name="cause_disablity[]" >
                  <label for="inputPassword4">Cerebral Palsy</label>

                </div>
                <div class="form-group col-md-3">
                  <input type="checkbox" value="Injury" name="cause_disablity[]" >
                  <label for="inputPassword4">Injury
                  </label>

                </div>
              </div>


              <button type="submit" class="btn btn-primary col-md-1">Save</button>
            </form>
          </div> <!-- /. card-body -->
        </div> <!-- /. card -->
      </div> <!-- /. col -->
    </div> <!-- /. end-section -->
  </div></body>
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