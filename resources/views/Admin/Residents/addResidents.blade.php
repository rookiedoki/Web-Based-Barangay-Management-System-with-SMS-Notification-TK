@extends('layout.dashboard-layout')

@section('content')


        @if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)
        <script>
        $(function() {
            $('#myModal').modal('show');
        });
        </script>
        @endif
  <div class="card shadow">
    <div class="card-body">
      <h2 class="h4 mb-1">Add Residents</h2>
      <div class="toolbar">
      <div class="row align-items-center h-100">
          
          <form action="/residents" method="POST" enctype="multipart/form-data" id="image-upload-preview" class="col-lg-8 col-md-8 col-10 mx-auto"  id="modal_regitration_form">
            @csrf

            <div class="col-sm-12">
              <div class="form-group">
                  <label class="labelImage">Image</label>
                  <img class="preview" id="prview" src="storage/no/-image.png"/>
                  <input type="file"  name="resident_image" id="resident_image">
              
               @Error('resident_image')
               <p class="text-danger text-md mt-1">{{$message}}</p>
            @enderror
          
              </div>
            </div><br>
    
        <div class="form-row">
          <div class="form-group col-sm-4">
            <label>First Name<span style="color: red">*</span></label>
            <input type="text" name="first_name" class="form-control" value="{{old('first_name')}}">
            @Error('first_name')
            <p class="text-danger text-md mt-1">{{$message}}</p>
           @enderror
          </div>
  
          <div class="form-group col-sm-4">
            <label>Middle Name<span style="color: red">*</span></label>
            <input type="text" name="middle_name" class="form-control" value="{{old('middle_name')}}">
            @Error('middle_name')
            <p class="text-danger text-md mt-1">{{$message}}</p>
           @enderror
          </div>
  
          <div class="form-group col-sm-4">
            <label>Last Name<span style="color: red">*</span></label>
            <input type="text" name="last_name" class="form-control" value="{{old('last_name')}}">
            @Error('last_name')
            <p class="text-danger text-md mt-1">{{$message}}</p>
           @enderror
          </div>
  
       </div>
  
       <div class="form-row">
        <div class="form-group col-sm-4">
          <label>Nickname<span style="color: red">*</span></label>
          <input type="text" name="nickname" class="form-control" value="{{old('nickname')}}">
          @Error('nickname')
            <p class="text-danger text-md mt-1">{{$message}}</p>
           @enderror
        </div>
  
        <div class="form-group col-sm-4">
          <label>Place of Birth<span style="color: red">*</span></label>
          <input type="text" name="place_of_birth" class="form-control" value="{{old('place_of_birth')}}">
          @Error('place_of_birth')
            <p class="text-danger text-md mt-1">{{$message}}</p>
           @enderror
        </div>
  
        <div class="form-group col-sm-4">
          <label>Birthdate<span style="color: red">*</span></label>
          <input type="text" class="form-control item" name="birthdate" id="nu_datebirth"  value="{{old('birthdate')}}">
          @Error('birthdate')
            <p class="text-danger text-md mt-1">{{$message}}</p>
           @enderror
        </div>
  
     </div>
  
     <div class="form-row">
      <div class="form-group col-sm-4">
        <label>Age<span style="color: red">*</span></label>
        <input readonly type="text" class="form-control item" name="age" id="a_ge"  value="{{old('age')}}">
        @Error('age')
            <p class="text-danger text-md mt-1">{{$message}}</p>
        @enderror
      </div>
  
      <div class="form-group col-sm-4">
        <label>Civil Status<span style="color: red">*</span></label>
        <select class="form-control" name="civil_status" value="{{old('civil_status')}}" required autocomplete="voter_status">
          <option value="">-Select Civil Status-</option>
          <option value="Single" @if (old('civil_status') == "Single") {{ 'selected' }} @endif >Single</option>
          <option value="Married" @if (old('civil_status') == "Married") {{ 'selected' }} @endif>Married</option>
          <option value="Widowed" @if (old('civil_status') == "Widowed") {{ 'selected' }} @endif>Widowed</option>
          <option value="Divorced" @if (old('civil_status') == "Divorced") {{ 'selected' }} @endif>Divorced</option>
          <option value="Separated" @if (old('civil_status') == "Separated") {{ 'selected' }} @endif>Separated</option>
          <option value="Annuled" @if (old('civil_status') == "Annuled") {{ 'selected' }} @endif>Annuled</option>
          <option value="Live-In" @if (old('civil_status') == "Live-In") {{ 'selected' }} @endif>Live-In</option>
      </select>
        @Error('civil_status')
            <p class="text-danger text-md mt-1">{{$message}}</p>
           @enderror
      </div>
  
      <div class="form-group col-sm-4">
        <label>Gender<span style="color: red">*</span></label>
        <select class="form-control" name="gender" value="{{old('gender')}}" required autocomplete="gender">
          <option value="">-Select Gender-</option>
          <option value="Male"  @if (old('gender') == "Male") {{ 'selected' }} @endif >Male</option>
          <option value="Female"  @if (old('gender') == "Female") {{ 'selected' }} @endif>Female</option>
      </select>
      @Error('gender')
            <p class="text-danger text-md mt-1">{{$message}}</p>
           @enderror
      </div>
  
   </div>
   
   <div class="form-row">
    <div class="form-group col-sm-3">
      <label>Street<span style="color: red">*</span></label>
      <input type="text" name="street" class="form-control" value="{{old('street')}}">
      @Error('street')
            <p class="text-danger text-md mt-1">{{$message}}</p>
           @enderror
    </div>
  
    <div class="form-group col-sm-3">
      <label>House No.<span style="color: red">*</span></label>
      <input type="text" name="house_no" class="form-control" value="{{old('house_no')}}">
      @Error('house_no')
            <p class="text-danger text-md mt-1">{{$message}}</p>
           @enderror
    </div>
  
    <div class="form-group col-sm-3">
      <label>Voter Status<span style="color: red">*</span></label>
      <select class="form-control" name="voter_status" value="{{old('voter_status')}}" required autocomplete="voter_status">
        <option value="">-Select Voter Status-</option>
        <option value="Voter" @if (old('voter_status') == "Voter") {{ 'selected' }} @endif>Voter</option>
        <option value="Non Voter" @if (old('voter_status') == "Non Voter") {{ 'selected' }} @endif>Non Voter</option>
    </select>	
    @Error('voter_status')
            <p class="text-danger text-md mt-1">{{$message}}</p>
           @enderror
    </div>
  
    <div class="form-group col-sm-3">
      <label>Citizenship<span style="color: red">*</span></label>
      <input type="text" name="citizenship" class="form-control" value="{{old('citizenship')}}">
      @Error('citizenship')
            <p class="text-danger text-md mt-1">{{$message}}</p>
           @enderror
    </div>
  
   </div>
   <div class="form-row">
  
    <div class="form-group col-sm-4">
      <label>Contact Number<span style="color: red">*</span></label>
      <input type="text" name="phone_number" class="form-control" value="{{old('phone_number')}}">
      @Error('contact_number')
            <p class="text-danger text-md mt-1">{{$message}}</p>
           @enderror
    </div>
  
    <div class="form-group col-sm-4">
      <label>Occupation<span style="color: red">*</span></label>
      <input type="text" id="occupation"  name="occupation" class="form-control" value="{{old('occupation')}}">
      @Error('occupation')
            <p class="text-danger text-md mt-1">{{$message}}</p>
           @enderror
  
    </div>
    <div class="form-group col-sm-4">
      <label>Work Status<span style="color: red">*</span></label>
      <select class="form-control" name="work_status" value="{{old('work_status')}}" required autocomplete="work_status" value="{{old('work_status')}}">
        <option value="">-Select Work Status-</option>
        <option value="Employed" @if (old('work_status') == "Employed") {{ 'selected' }} @endif>Employed</option>
        <option value="Unemployed" @if (old('work_status') == "Unemployed") {{ 'selected' }} @endif>Unemployed</option>
        <option value="Self-Employed" @if (old('work_status') == "Self-Employed") {{ 'selected' }} @endif>Self Employed</option>
     </select>
      @Error('occupation')
            <p class="text-danger text-md mt-1">{{$message}}</p>
           @enderror
  
    </div>
   </div>
    <div class="form-row">
      <div class="form-group col-sm-6">
        <label>Email Address</label>
        <input type="text" name="email" class="form-control" value="{{old('email')}}">
        @Error('email')
              <p class="text-danger text-md mt-1">{{$message}}</p>
             @enderror
      </div>
    <div class="form-group col-sm-6">
      <label>Username<span style="color: red">*</span></label>
      <input type="text" type="text"  name="username" class="form-control" value="{{old('username')}}">
      @Error('username')
            <p class="text-danger text-md mt-1">{{$message}}</p>
           @enderror
    </div>

    <input type="hidden"  name="userType" value="1">
    <input type="hidden"  name="status" value="1">
  
   </div>

   <div class="form-row">
        <div class="form-group col-sm-6">
          <label>Password<span style="color: red">*</span></label>
          <input type="password" class="form-control" name="password" id="password" value="{{old('password')}}" required autocomplete="password">
       @Error('password')
       <p class="text-danger text-md mt-1">{{$message}}</p>
    @enderror
        </div>

      <div class="form-group col-sm-6">
        <label>Confirm Password<span style="color: red">*</span></label>
        <input type="password" class="form-control item" name="password_confirmation" id="password" >
        @Error('password_confirmation')
     <p class="text-danger text-md mt-1">{{$message}}</p>
  @enderror
      </div>

      <input type="hidden"  name="userType" value="1">
      <input type="hidden"  name="status" value="1">

 </div>

          <a href="#" class="btn btn-lg btn-primary btn-block" data-toggle="modal" data-target="#myModal"> <span>ADD</span></a>
          {{-- <button href="#" class="btn btn-lg btn-primary btn-block" data-toggle="modal" data-target="#submit">Accept</button> --}}

              {{----------------------Modal Verificaton---------------------------------------}}
                          <div id="myModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                        <div class="modal-header">						
                                            <h4 class="modal-title">User Verification</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">					
                                            <p>Please Enter Your Password to Confirm</p>
                                            <p class="text-warning"><small>This action cannot be undone.</small></p>
                                        </div>
                                        <div class="row register-form">
                                            <div class="col-sm-12">
                                                <div class="modal-body">					
                                                    <div class="form-group">
                                                        <label >Password</label>
                                                        <input type="password" class="verify form-control" name="verify" id="verify" value="{{old('password')}}" required autocomplete="password">
                                                    
                                                        @Error('verify')
                                                            <p class="text-danger text-md mt-1">{{$message}}</p>
                                                        @enderror
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                            <button type="submit" class="btn btn-primary btn-sm submit">Confirm</button></a>
                                        </div>
                                  </div>
                            </div>
                      </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
        </form>
      </div>
  </div>
  </div>
  </div>
  {{-- <?php 
    $pass  = Auth::user()->getAuthPassword();
    ?>
<script>
  var timer;
  var timeout = 1000;

  $('#verify').keyup(function(){
    if (timer) {
      clearTimeout(timer);
    }
    timer = setTimeout(saveData, timeout)
  });

  function saveData() {
    
    var verify = $('#verify').val();
    var encrypt = "<?php echo bcrypt(verify)?>";
    var haha1 = "<?php echo $pass;?>";
    alert(encrypt);
  }
</script> --}}
  {{-- <script>
      $(document).ready(function () {
         $(document).on('click', '.submit', function (e) {
           e.preventDefault();
           var data = {
              'verify': $('.verify').val(), 
              }

              // console.log(data);
              $.ajaxSetup({
                  headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
                  $.ajax({
                  type: "POST",
                  url: "/residents",
                  data: data,
                  dataType: "json",
                  success: function (response) {
                  console.log(response);
                  }
                  });       
         });
      });
    </script> --}}

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
            
            <script>
             $(function() {
                $("#nu_datebirth").datepicker({
                onSelect: function(value, ui) {
                    var today = new Date(),
                        age = today.getFullYear() - ui.selectedYear;
                    $('#a_ge').val(age);
                },
                   
                dateFormat: 'dd-mm-yy',changeMonth: true,changeYear: true,yearRange:"c-100:c+0"
                });
                  
            });
              </script>
            
            <script>
              resident_image.onchange = evt => {
                const [file] = resident_image.files
                if (file) {
                  prview.style.visibility = 'visible';
              
                  prview.src = URL.createObjectURL(file)
                }
              }
            </script>
            
            <script>
              id_image.onchange = evt => {
                const [file] = id_image.files
                if (file) {
                  prvieww.style.visibility = 'visible';
              
                  prvieww.src = URL.createObjectURL(file)
                }
              }
            </script>
            
@endsection

