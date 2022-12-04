<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{url('assets/css/simplebar.css')}}">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{url('assets/css/feather.css')}}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{url('assets/css/daterangepicker.css')}}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{url('assets/css/app-light.css')}}" id="lightTheme" disabled>
    <link rel="stylesheet" href="{{url('assets/css/app-dark.css')}}" id="darkTheme">
  </head>
  <body class="dark-register ">
    <div class="wrapper vh-100">
      <div class="row align-items-center h-100">
        <form  method="POST" enctype="multipart/form-data"  action="/register" class="col-lg-6 col-md-8 col-10 mx-auto"  >
          @csrf
          <div class="mx-auto text-center my-4">

            @if(session()->has('message'))
            <div class="alert" id="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{session()->get('message')}}

          </div>
          @endif
          @foreach($setting as $settings)
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
              <img src="{{$settings->barangay_logo ? asset ('storage/' .$settings->barangay_logo) : asset('/storage/no/-image.png')}}" style="width: 45%">
            </a>
            @endforeach
            <h2 class="my-3">Register</h2>
          </div>
          
        <div class="form-row">
          <div class="form-group col-sm-4">
            <label>First Name</label>
            <input type="text" name="first_name" class="form-control" value="{{old('first_name')}}">
            @Error('first_name')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
          </div>

          <div class="form-group col-sm-4">
            <label>Middle Name</label>
            <input type="text"  name="middle_name" class="form-control" value="{{old('middle_name')}}">
            @Error('middle_name')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
          </div>

          <div class="form-group col-sm-4">
            <label>Last Name</label>
            <input type="text"  name="last_name" class="form-control" value="{{old('last_name')}}">
            @Error('last_name')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
          </div>

       </div>

       <div class="form-row">
        <div class="form-group col-sm-4">
          <label>Nickname</label>
          <input type="text"  name="nickname" class="form-control" value="{{old('nickname')}}">
          @Error('nickname')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
        </div>

        <div class="form-group col-sm-4">
          <label>Place of Birth</label>
          <input type="text" name="place_of_birth" class="form-control" value="{{old('place_of_birth')}}">
          @Error('place_of_birth')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
        </div>

        <div class="form-group col-sm-4">
          <label>Birthdate</label>
          <input type="date" name="birthdate" class="form-control" value="{{old('birthdate')}}">
          @Error('birthdate')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
        </div>

     </div>

     <div class="form-row">
      <div class="form-group col-sm-4">
        <label>Age</label>
        <input type="text" name="age" class="form-control" value="{{old('age')}}">
        @Error('age')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="form-group col-sm-4">
        <label>Civil Status</label>
        <select class="form-control" name="civil_status" value="{{old('civil_status')}}" required autocomplete="voter_status">
          <option value="">-Select Civil Status-</option>
          <option value="Single">Single</option>
          <option value="Married">Married</option>
          <option value="Widowed">Widowed</option>
          <option value="Divorced">Divorced</option>
          <option value="Separated">Separated</option>
          <option value="Annuled">Annuled</option>
          <option value="Live-In">Live-In</option>
      </select>
        @Error('civil_status')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
      </div>

      <div class="form-group col-sm-4">
        <label>Gender</label>
        <select class="form-control" name="gender" value="{{old('gender')}}" required autocomplete="gender" >
          <option value="">-Select Gender-</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
      </select>
      @Error('gender')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
      </div>

   </div>
   
   <div class="form-row">
    <div class="form-group col-sm-3">
      <label>Street</label>
      <input type="text"  name="street" class="form-control" value="{{old('street')}}">
      @Error('street')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
    </div>
    <div class="form-group col-sm-3">
      <label>House No.</label>
      <input type="text"  name='house_no' class="form-control" value="{{old('house_no')}}">
      @Error('house_no')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
    </div>

    <div class="form-group col-sm-3">
      <label>Voter Status</label>
      <select class="form-control" name="voter_status" value="{{old('voter_status')}}" required autocomplete="voter_status" value="{{old('voter_status')}}">
        <option value="">-Select Voter Status-</option>
        <option value="Voter">Voter</option>
        <option value="Non Voter">Non Voter</option>
    </select>
    @Error('voter_status')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
    </div>

    <div class="form-group col-sm-3">
      <label>Citizenship</label>
      <input type="text"  name="citizenship" class="form-control" value="{{old('citizenship')}}">
      @Error('citizenship')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
    </div>

   </div>
   <div class="form-row">
    <div class="form-group col-sm-4">
      <label>Contact Number</label>
      <input type="text"  name="phone_number" class="form-control" value="{{old('phone_number')}}">
      @Error('contact_number')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
    </div>

    <div class="form-group col-sm-4">
      <label>Occupation</label>
      <input type="text" id="occupation"  name="occupation" class="form-control" value="{{old('occupation')}}">
      @Error('occupation')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
    </div>
    
    <div class="form-group col-sm-4">
      <label>Work Status</label>
      <select class="form-control" name="work_status" value="{{old('work_status')}}" required autocomplete="work_status" value="{{old('work_status')}}">
        <option value="">-Select Work Status-</option>
        <option value="Employed">Employed</option>
        <option value="Unemployed">Unemployed</option>
        <option value="Self-Employed">Self Employed</option>
        <option value="N/A">N/A</option>
     </select>
      @Error('work_status')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
    </div>
   </div>
    <div class="form-row">
      <div class="form-group col-sm-6">
        <label>Email Address</label>
        <input type="text" name="email" class="form-control" value="{{old('email')}}">
        @Error('email')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
             @enderror
      </div>

      <div class="form-group col-sm-6">
        <label>Password</label>
        <input type="password"  name="password" class="form-control" value="{{old('password')}}">
        @Error('password')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
             @enderror
      </div>
      <input type="hidden"  name="userType" value="0">
  </div>

          <hr class="my-4">
          <div class="row mb-4">
            <div class="col-md-6">
              <div class="form-group">
                <label >Profile Image</label>
                <input type="file" name="resident_image" id="inputPassword5">
                @Error('resident_image')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
               @enderror
              </div>
              <div class="form-group">
                <label >ID or Birth Certicate</label>
                <input type="file"  name="id_image" id="inputPassword6">
                @Error('id_image')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
               @enderror
              </div>
            </div>
            <div class="col-md-6">
              <p class="mb-2">Reminders!</p>
              <p class="small text-muted mb-2"> You have to Register to create an account, and you have upload an image of your ID or Birth Certicate to verify if you're truly a residence of the barangay </p>
              <p class="small text-muted mb-2"> NOTE: </p>
              <ul class="small text-muted pl-4 mb-0">
                <li>The image must be clear and it can be read clearly </li>
                <li>Either ID or Birth Certificate can be accepted</li>
                <li>After you register, wait for a while because the admin will check your profile </li>
              </ul>
            </div>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
          <p class="mt-2 mb-3 text-center">Already have an account? <a href="/">Sign Up</p></a>
          <p class="mt-5 mb-3 text-muted text-center">© 2022</p>
          <input type="hidden"  name="userType" value="1">
          <input type="hidden"  name="status" value="0">
        </form>

      </div>
    </div>
    <script src="{{url('assets/js/jquery.min.js')}}"></script>
    <script src="{{url('assets/js/popper.min.js')}}"></script>
    <script src="{{url('assets/js/moment.min.js')}}"></script>
    <script src="{{url('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{url('assets/js/simplebar.min.js')}}"></script>
    <script src='{{url('assets/js/daterangepicker.js')}}'></script>
    <script src='{{url('assets/js/jquery.stickOnScroll.js')}}'></script>
    <script src="{{url('assets/js/tinycolor-min.js')}}"></script>
    <script src="{{url('assets/js/config.js')}}"></script>
    <script src="{{url('assets/js/apps.js')}}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>
    
    <script type="text/javascript">
    
    $("document").ready(function()

    {
      setTimeout(function()
        {
          $("div.alert").remove();
        },3000);
    });
    
    </script>
  </body>
</html>
</body>
</html>



