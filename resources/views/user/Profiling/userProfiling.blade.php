
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
          @if(auth()->user()->adminResidents->gender=='Female')
          <li><a class="nav-link scrollto" href="/pregnant" style="text-decoration:none">Pregnant</a></li>
          @endif

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

<style>
  .data {
    display: none;
  }
</style>
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
    <div id="home" class="tab-pane fade in active">
      <h3>Covid 19 Vaccinated</h3>
      <p>Reminder: Do not fillup this form if not applicable.</p>
      <div class="row">
        <div class="col-md-12">
          <div class="card shadow mb-4">
            <div class="card-header">
            </div>
            <div class="card-body">
              <form action="/storeVaccinationPartial" method="POST" enctype="multipart/form-data">
                @csrf
                
                

                <div class="form-group col-md-4">
                    <label >Status</label>
                        <select class="form-control" id="dose" value="{{old('dose')}}" >
                          <option value="">-Please Select-</option>
                          <option value="Partially_Vaccinated">Partially Vaccinated</option>
                          <option value="Fully_Vaccinated">Fully Vaccinated</option>
                          <option value="With_Booster">With Booster</option>
                      </select>

                    @Error('dose')
                      <p class="text-danger text-xl mt-2">{{$message}}</p>
                    @enderror
                </div>

              <div id="Partially_Vaccinated" class="data"> 
                
                <input type="hidden"  name="name" value="{{ ucfirst(auth()->user()->adminResidents->first_name)}}, {{ucfirst(auth()->user()->adminResidents->last_name)}}  {{ucfirst(substr(auth()->user()->adminResidents->middle_name, 0,1)) }}.">
                <input type="hidden"  name="age" value="{{auth()->user()->adminResidents->age}}">
                <input type="hidden"  name="birthdate" value="{{auth()->user()->adminResidents->birthdate}}">
                <input type="hidden"  name="status" value="0">
                <input type="hidden"  name="dose" value="Partially Vaccinated">
        <div class="form-group col-md-4">
              <label for="inputEmail4">Type of Vaccine</label>
                <select class="form-control" name="vaccine_type" value="{{old('vaccine_type')}}" value="{{old('work_status')}}">
                    <option value="">-Please Select-</option>
                    <option value="Pfizer">Pfizer</option>
                    <option value="AstraZeneca">AstraZeneca</option>
                    <option value="Sinovac">Sinovac</option>
                    <option value="Moderna">Moderna</option>
                    <option value="Janssen">Janssen</option>
                    <option value="Novavax">Novavax</option>
                </select>
                @Error('vaccine_type')
                <p class="text-danger text-xl mt-2">{{$message}}</p>
                @enderror
          </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4">Vaccination Address</label>
                <input type="text"  name="address" class="form-control" >
                @Error('address')
                <p class="text-danger text-xs mt-1">{{$message}}</p>
                 @enderror
              </div> 

                <div class="form-group col-md-4" id="date_first">
                          <label>Date of First Dose</label>
                          <input type="date"  name="date_first" class="form-control"  placeholder="">
                          @Error('date_first')
                              <p class="text-danger text-xs mt-1">{{$message}}</p>
                          @enderror
                  </div>

                  <div class="form-group">
                      <label class="labelImage">Vaccine Card Image</label>
                      <img class="preview" id="prview"/>
                      <input type="file"  name="vaccine_image" id="vaccine_image">

                        @Error('vaccine_image')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                  </div>
                  <input type="hidden"  name="booster_image" value="">
                  
                  <button type="submit" class="btn btn-primary">Save</button>
              </div> 
 
       </form>

       <form action="/storeVaccinationFully" method="POST" enctype="multipart/form-data">
        @csrf
              <div id="Fully_Vaccinated" class="data"> 

                <input type="hidden"  name="name" value="{{ ucfirst(auth()->user()->adminResidents->first_name)}}, {{ucfirst(auth()->user()->adminResidents->last_name)}}  {{ucfirst(substr(auth()->user()->adminResidents->middle_name, 0,1)) }}.">
                <input type="hidden"  name="age" value="{{auth()->user()->adminResidents->age}}">
                <input type="hidden"  name="birthdate" value="{{auth()->user()->adminResidents->birthdate}}">
                <input type="hidden"  name="status" value="0">
                <input type="hidden"  name="dose" value="Fully Vaccinated">
        <div class="form-group col-md-4">
              <label for="inputEmail4">Type of Vaccine</label>
                <select class="form-control" name="vaccine_type" value="{{old('vaccine_type')}}" value="{{old('work_status')}}">
                    <option value="">-Please Select-</option>
                    <option value="Pfizer">Pfizer</option>
                    <option value="AstraZeneca">AstraZeneca</option>
                    <option value="Sinovac">Sinovac</option>
                    <option value="Moderna">Moderna</option>
                    <option value="Janssen">Janssen</option>
                    <option value="Novavax">Novavax</option>
                </select>
                @Error('vaccine_type')
                <p class="text-danger text-xl mt-2">{{$message}}</p>
                @enderror
          </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4">Vaccination Address</label>
                <input type="text"  name="address" class="form-control" >
                @Error('address')
                <p class="text-danger text-xs mt-1">{{$message}}</p>
                 @enderror
              </div> 
                  <div class="form-group col-md-6" id="date_first">
                          <label>Date of First Dose</label>
                          <input type="date"  name="date_first" class="form-control" placeholder="">
                          @Error('date_first')
                              <p class="text-danger text-xs mt-1">{{$message}}</p>
                          @enderror
                  </div>

                  <div class="form-group col-md-6" id="date_second">
                      <label>Date of 2nd Dose</label>
                      <input type="date"  name="date_second" class="form-control" >
                        @Error('date_second')
                          <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                  </div>

                  <div class="form-group col-md-6">
                    <label >Vaccine Card Image</label>
                    <img class="preview" id="prview"/>
                    <input type="file"  name="vaccine_image" id="vaccine_image">
                      @Error('vaccine_image')
                      <p class="text-danger text-xs mt-1">{{$message}}</p>
                      @enderror
                </div>

                <input type="hidden"  name="booster_image" value="">

                <button type="submit" class="btn btn-primary">Save</button>
              </div> 
        </form>

        <form action="/storeVaccinationBooster" method="POST" enctype="multipart/form-data">
            @csrf        
            <div id="With_Booster" class="data">   
                  <input type="hidden"  name="name" value="{{ ucfirst(auth()->user()->adminResidents->first_name)}}, {{ucfirst(auth()->user()->adminResidents->last_name)}}  {{ucfirst(substr(auth()->user()->adminResidents->middle_name, 0,1)) }}.">
                  <input type="hidden"  name="age" value="{{auth()->user()->adminResidents->age}}">
                  <input type="hidden"  name="birthdate" value="{{auth()->user()->adminResidents->birthdate}}">
                  <input type="hidden"  name="status" value="0">
                  <input type="hidden"  name="dose" value="With Booster">
          <div class="form-group col-md-4">
                <label for="inputEmail4">Type of Vaccine</label>
                  <select class="form-control" name="vaccine_type" value="{{old('vaccine_type')}}" value="{{old('work_status')}}">
                      <option value="">-Please Select-</option>
                      <option value="Pfizer">Pfizer</option>
                      <option value="AstraZeneca">AstraZeneca</option>
                      <option value="Sinovac">Sinovac</option>
                      <option value="Moderna">Moderna</option>
                      <option value="Janssen">Janssen</option>
                      <option value="Novavax">Novavax</option>
                  </select>
                  @Error('vaccine_type')
                  <p class="text-danger text-xl mt-2">{{$message}}</p>
                  @enderror
            </div>
                <div class="form-group col-md-4">
                  <label for="inputPassword4">Vaccination Address</label>
                  <input type="text"  name="address" class="form-control" >
                  @Error('address')
                  <p class="text-danger text-xs mt-1">{{$message}}</p>
                  @enderror
                </div>  
                    <div class="form-group col-md-6" id="date_first">
                              <label>Date of First Dose</label>
                              <input type="date"  name="date_first" class="form-control"  placeholder="">
                                @Error('date_first')
                                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                                @enderror 
                    </div> 
                    
                  <div class="form-group col-md-6" id="date_second">
                            <label for="inputZip">Date of 2nd Dose</label>
                            <input type="date"  name="date_second" class="form-control" >
                              @Error('date_second')
                                <p class="text-danger text-xs mt-1">{{$message}}</p>
                              @enderror
                  </div>

                

                      <div class="form-group col-md-4" id="first_booster">
                              <label>1st Booster Type of Vaccine</label>
                              <select class="form-control" name="first_booster">
                                <option value="">-Please Select-</option>
                                <option value="Pfizer">Pfizer</option>
                                <option value="AstraZeneca">AstraZeneca</option>
                                <option value="Sinovac">Sinovac</option>
                                <option value="Moderna">Moderna</option>
                                <option value="Janssen">Janssen</option>
                                <option value="Novavax">Novavax</option>
                            </select>
                                @Error('first_booster')
                                  <p class="text-danger text-xs mt-1">{{$message}}</p>
                                @enderror
                      </div>

                  <div class="form-group col-md-4" id="first_booster_date">
                      <label for="inputZip">Date of 1st Booster</label>
                      <input type="date"  name="first_booster_date" class="form-control" >

                      @Error('first_booster_date')
                      <p class="text-danger text-xs mt-1">{{$message}}</p>
                      @enderror
                  </div>
                    
              <div class="form-group col-md-4" id="second_booster">
                    <label>2nd Booster Type of Vaccine</label>
                    <select class="form-control" name="second_booster" >
                      <option value="">-Please Select-</option>
                      <option value="Pfizer">Pfizer</option>
                      <option value="AstraZeneca">AstraZeneca</option>
                      <option value="Sinovac">Sinovac</option>
                      <option value="Moderna">Moderna</option>
                      <option value="Janssen">Janssen</option>
                      <option value="Novavax">Novavax</option>
                  </select>
                      @Error('second_booster')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                      @enderror
            </div>

            <div class="form-group col-md-4" id="second_booster_date">
              <label for="inputZip">Date of 2nd Booster</label>
              <input type="date"  name="second_booster_date" class="form-control" >

              @Error('second_booster_date')
              <p class="text-danger text-xs mt-1">{{$message}}</p>
              @enderror
          </div>

              <div class="form-group col-md-4">
                  <label >Vaccine Card Image</label>
                  <img class="preview" id="prview"/>
                  <input type="file"  name="vaccine_image" id="vaccine_image">

                    @Error('vaccine_image')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                    @enderror
              </div>

          <div class="form-group">
              <label class="labelImage">Booster Card Image</label>
              <img class="preview" id="prview"/>
              <input type="file"  name="booster_image" id="booster_image">

                @Error('booster_image')
                <p class="text-danger text-xs mt-1">{{$message}}</p>
                @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $("#dose").on('change', function(){
      $(".data").hide();
      $("#" + $(this).val()).fadeIn(700);
    }).change();
  });
</script>