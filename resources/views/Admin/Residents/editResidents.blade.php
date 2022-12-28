@extends('layout.dashboard-layout')

@section('content')


  <div class="card shadow">
    <div class="card-body">
      <h2 class="h4 mb-1">Edit Residents</h2>
      <div class="toolbar">
      <div class="row align-items-center h-100">
       
          

          
        <form action="/residents/{{$residents->id}}" method="POST" enctype="multipart/form-data" id="image-upload-preview" class="col-lg-8 col-md-8 col-10 mx-auto"  >
            @csrf
            @method('PUT')

            <div class="col-sm-12">
              <div class="form-group">
      <label class="labelImage">Image</label>
                            <img class="preview" id="preview" src="{{$residents->resident_image ? asset ('storage/' .$residents->resident_image) : asset('/storage/no/-image.png')}}" alt="" />
                            <input type="file"  name="resident_image" id="resident_image2" value="{{$residents->resident_image}}" >
               @Error('resident_image')
               <p class="text-danger text-md mt-1">{{$message}}</p>
            @enderror
          
              </div>
            </div><br>
    
        <div class="form-row">
          <div class="form-group col-sm-4">
            <label>First Name</label>
            <input type="text" name="first_name" class="form-control" value="{{$residents->first_name}}" required autocomplete="first_name">
            @Error('first_name')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
          </div>
  
          <div class="form-group col-sm-4">
            <label>Middle Name</label>
            <input type="text" name="middle_name" class="form-control" value="{{$residents->middle_name}}" required autocomplete="middle_name">
            @Error('middle_name')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
          </div>
  
          <div class="form-group col-sm-4">
            <label>Last Name</label>
            <input type="text" name="last_name" class="form-control" value="{{$residents->last_name}}" required autocomplete="last_name">
            @Error('last_name')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
          </div>
  
       </div>
  
       <div class="form-row">
        <div class="form-group col-sm-4">
          <label>Nickname</label>
          <input type="text" name="nickname" class="form-control" value="{{$residents->nickname}}" required autocomplete="nickname">
          @Error('nickname')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
        </div>
  
        <div class="form-group col-sm-4">
          <label>Place of Birth</label>
          <input type="text" name="place_of_birth" class="form-control" value="{{$residents->place_of_birth}}" required autocomplete="place_of_birth">
          @Error('place_of_birth')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
        </div>
  
        <div class="form-group col-sm-4">
          <label>Birthdate</label>
          <input type="text" class="form-control item" name="birthdate" id="nu_datebirth" value="{{$residents->birthdate}}">
          @Error('birthdate')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
        </div>
  
     </div>
  
     <div class="form-row">
      <div class="form-group col-sm-4">
        <label>Age</label>
        <input readonly type="text" class="form-control item" name="age" id="a_ge"  value="{{$residents->age}}">
        @Error('age')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>
  
      <div class="form-group col-sm-4">
        <label>Civil Status</label>
        <select class="form-control" name="civil_status" value="{{old('civil_status')}}" required autocomplete="voter_status">
          <option value="">-Select Civil Status-</option>
          <option value="Single"{{$residents->civil_status=="Single" ? 'selected' :''}}>Single</option>
          <option value="Married" {{$residents->civil_status=="Married" ? 'selected' :''}}>Married</option>
          <option value="Widowed" {{$residents->civil_status=="Widowed" ? 'selected' :''}}>Widowed</option>
          <option value="Divorced" {{$residents->civil_status=="Divorced" ? 'selected' :''}}>Divorced</option>
          <option value="Separated" {{$residents->civil_status=="Separated" ? 'selected' :''}}>Separated</option>
          <option value="Annuled" {{$residents->civil_status=="Annuled" ? 'selected' :''}}>Annuled</option>
          <option value="Live-In" {{$residents->civil_status=="Live-In" ? 'selected' :''}}>Live-In</option>
      </select>
        @Error('civil_status')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
      </div>
  
      <div class="form-group col-sm-4">
        <label>Gender</label>
        <select class="form-control" id="gender"name="gender" required autocomplete="gender">     
            <option value="Male"{{$residents->gender=="Male" ? 'selected' :''}}>Male</option>
            <option value="Female"{{$residents->gender=="Female" ? 'selected' :''}}>Female</option>
        </select>
      @Error('gender')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
      </div>
  
   </div>
   
   <div class="form-row">
    <div class="form-group col-sm-3">
      <label>Street</label>
      <input type="text" name="street" class="form-control" value="{{$residents->street}}">
      @Error('street')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
    </div>
  
    <div class="form-group col-sm-3">
      <label>House No.</label>
      <input type="text" name="house_no" class="form-control" value="{{$residents->house_no}}">
      @Error('house_no')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
    </div>
  
    <div class="form-group col-sm-3">
      <label>Voter Status</label>
      <select class="form-control" id="voter_status"name="voter_status" required autocomplete="voter_status">             
        <option value="Voter"{{$residents->voter_status=="Voter" ? 'selected' :''}}>Voter</option>
        <option value="Non Voter"{{$residents->voter_status=="Non Voter" ? 'selected' :''}}>Non Voter</option>
    </select>
    @Error('voter_status')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
    </div>
  
    <div class="form-group col-sm-3">
      <label>Citizenship</label>
      <input type="text" name="citizenship" class="form-control" value="{{$residents->citizenship}}">
      @Error('citizenship')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
    </div>
  
   </div>
   <div class="form-row">
  
    <div class="form-group col-sm-4">
      <label>Contact Number</label>
      <input type="text" name="phone_number" class="form-control" value="{{$residents->phone_number}}">
      @Error('contact_number')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
    </div>
  
    <div class="form-group col-sm-4">
      <label>Occupation</label>
      <input type="text" id="occupation"  name="occupation" class="form-control" value="{{$residents->occupation}}">
      @Error('occupation')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
  
    </div>
    <div class="form-group col-sm-4">
      <label>Work Status</label>
      <select class="form-control" name="work_status" value="{{old('work_status')}}" required autocomplete="work_status" value="{{old('work_status')}}">
        <option value="Employed"{{$residents->work_status=="Employed" ? 'selected' :''}}>Employed</option>
        <option value="Unemployed"{{$residents->work_status=="Unemployed" ? 'selected' :''}}>Unemployed</option>
        <option value="Self-Employed"{{$residents->work_status=="Self-Employed" ? 'selected' :''}}>Self Employed</option>
     </select>
      @Error('occupation')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
  
    </div>
   </div>
    <div class="form-row">
      <div class="form-group col-sm-6">
        <label>Email Address</label>
        <input type="text" name="email" class="form-control" value="{{$residents->email}}">
        @Error('email')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
             @enderror
      </div>
    <div class="form-group col-sm-6">
      <label>Username</label>
      <input type="text" type="text"  name="username" class="form-control" value="{{$residents->username}}">
      @Error('username')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
    </div>

    <input type="hidden"  name="userType" value="1">
    <input type="hidden"  name="status" value="1">
  
   </div>

   <div class="form-row">
      <input type="hidden"  name="userType" value="1">
      <input type="hidden"  name="status" value="1">
 </div>

          <a href="#" class="btn btn-lg btn-primary btn-block" data-toggle="modal" data-target="#submit"> <span>Update</span></a>
          {{-- <button href="#" class="btn btn-lg btn-primary btn-block" data-toggle="modal" data-target="#submit">Accept</button> --}}

                          {{-- -------------------Modal Verificaton------------------------------------ --}}
                          <div id="submit" class="modal fade">
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
                                                        <input type="password" class="form-control" name="verify" value="{{old('password')}}" required autocomplete="password">
                                                    
                                                        @Error('verify')
                                                            <p class="text-danger text-md mt-1">{{$message}}</p>
                                                        @enderror
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                            <button type="submit" class="btn btn-primary btn-sm" >Confirm</button></a>
                                        </div>
    
                                </div>
                            </div>
                        </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
        </form>
      </div>
  </div>
  </div>
  </div>
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

