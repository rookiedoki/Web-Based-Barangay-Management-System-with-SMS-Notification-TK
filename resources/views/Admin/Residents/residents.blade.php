@extends('layout.dashboard-layout')
@section('content')

<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
      <h2 class="h4 mb-1">Manage Residence</h2>
        {{-- <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa print"></i></a> --}}
      <div class="card shadow">
        <div class="card-body">
          <div class="toolbar">

            <form class="form">
              <div class="form-row">
                <div class="form-group col-auto mr-auto">
                    <a href="addResidents" class="btn btn-success"><i class="fas fa-plus" ></i> <span>Add New Residents</span></a>
                  {{-- <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addResidentsModal"><i class="fas fa-plus" ></i> <span>Add New Residents</span></a> --}}
                </div>
                <div action="/residents" class="form-group col-auto">
                  <label for="search" class="sr-only">Search</label>
                  <input type="text" class="form-control" id="search" name="search" value="" placeholder="Search"> 
                </div>
              </div>
            </form>
            
          </div>
          <!-- table -->
          <table class="table table-borderless table-hover">
            <thead>
              <tr>   
                <th style="width:12%">Image</th>
                <th>Name</th>
                <th>Nick Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Phone Number</th>
                <th style="width:12%"> Actions  </th>
              </tr>
            </thead>

            @foreach($resident as $residents)
           
            <tbody>
              <tr>
                
                <td>
                  <div class="image-round">
                    <img class="imagePreview" src="{{$residents->resident_image ? asset ('storage/' .$residents->resident_image) : asset('/storage/no/-image.png')}}" alt=""  />
                  </div>
                </td>
                <td>{{ucfirst($residents->last_name)}}, {{ucfirst($residents->first_name)}}  {{ucfirst(substr($residents->last_name, 0,1)) }}.</td>     
                <td>{{ucfirst($residents->nickname)}}</td>
                <td>{{$residents->gender}}</td>
                <td>{{$residents->age}}</td>
                <td>{{$residents->phone_number}}</td>
                <td>
                    <a href="{{url('editResidents',$residents->id)}}" class="edit" ><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                    <a href="#deleteResidentsModal{{$residents->id}}" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                    <a href="{{url('viewResidents',$residents->id)}}"><i class="fas fa-eye" ></i></a>
                    {{-- <a class="btn btn-danger" href="{{url('viewResidents',$residents->id)}}">View</a> --}}  
                </td>
              </tr>

                <!---------------------------------------- Delete Residents Modal HTML -------------------------------------->
                <div id="deleteResidentsModal{{$residents->id}}" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST"  action="{{url('deleteResidents',$residents->id)}}">
                                @csrf
                                <div class="modal-header">						
                                    <h4 class="modal-title">Delete Residents</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
            
            
                                <div class="modal-body">					
                                    <p>Are you sure you want to delete these Records?</p>
                                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                    {{-- <input type="submit" href="{{url('deleteResidents', $residents->id)}}" class="btn btn-danger" value="Delete"> --}}
                                    {{-- <a class="btn btn-danger" href="{{url('deleteResidents',$residents->id)}}">Delete</a> --}}
                                    <button type="submit" class="btn btn-primary btn-sm" >Delete</button></a>
                                </div>
            
                            </form>
                        </div>
                    </div>
                </div>
<!--------------------------------- Edit Residents Modal HTML ------------------------------------------>

<div id="editResidentsModal{{$residents->id}}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="/residents/{{$residents->id}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

                <div class="modal-header">						
                    <h4 class="modal-title">Edit Residents</h4>
                    
             
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <div class="row register-form">
             
                        <div class="modal-body">
                            <div class="form-group">
                            <label class="labelImage">Image</label>
                            <img class="preview" id="preview" src="{{$residents->resident_image ? asset ('storage/' .$residents->resident_image) : asset('/storage/no/-image.png')}}" alt="" />
                            <input type="file"  name="resident_image" id="resident_image2" value="{{$residents->resident_image}}" >
                         </div>
                        
                        
                         @Error('resident_image')
                         <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror
                    
                        </div>
                    </div>
                
            <div class="row register-form">
                <div class="col-sm-4">
                    <div class="modal-body">					
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="first_name" value="{{$residents->first_name}}" required autocomplete="first_name">
                        
                            @Error('first_name')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="modal-body">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" name="middle_name" value="{{$residents->middle_name}}" required autocomplete="middle_name">
                    </div>

                    @Error('middle_name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                     @enderror

                    </div>
                </div>
            

            <div class="col-sm-4">
                <div class="form-group">
                    <div class="modal-body">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="last_name" value="{{$residents->last_name}}" required autocomplete="last_name">
                </div>

                @Error('last_name')
                     <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

                </div>
            </div>
        </div>

            

         <div class="row register-form">
                <div class="col-sm-4">
                    <div class="modal-body">
                        <div class="form-group">
                        <label>Nickname</label>
                        <input type="text" class="form-control" name="nickname" value="{{$residents->nickname}}" required autocomplete="nickname">
                     </div>

                     @Error('nickname')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                     @enderror

                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="modal-body">
                        <label>Place of Birth</label>
                        <input type="text" class="form-control" name="place_of_birth" value="{{$residents->place_of_birth}}" required autocomplete="place_of_birth">
                    </div>	
                    
                    @Error('place_of_birth')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                     @enderror
                    
                    </div>			
                </div>

                
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="modal-body">
                        <label>Birthdate</label>
                        <input type="date" class="form-control" name="birthdate" value="{{$residents->birthdate}}" required autocomplete="birthdate">
                    </div>	
                    
                    @Error('birthdate')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @enderror

                    </div>			
                </div>

            </div>

            <div class="row register-form">
                <div class="col-sm-4">
                    <div class="modal-body">
                        <div class="form-group">
                        <label>Age</label>
                        <input type="text" class="form-control" name="age" value="{{$residents->age}}" required autocomplete="age">
                     </div>

                     @Error('age')
                     <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                  @enderror

                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="modal-body">
                        <label>Civil Status</label>
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
                    </div>	
                    
                    @Error('civil_status')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @enderror

                    </div>			
                </div>

                
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="modal-body">
                        <label>Gender</label>
                    </div>
                    
                    @Error('gender')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @enderror

                    </div>			
                </div>

            </div>

            <div class="row register-form">
                <div class="col-sm-4">
                    <div class="modal-body">
                        <div class="form-group">
                        <label>Street</label>
                        <input type="text" class="form-control" name="street" value="{{$residents->street}}" required autocomplete="street">
                     </div>

                     @Error('street')
                     <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                  @enderror

                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="modal-body">
                        <div class="form-group">
                        <label>House No.</label>
                        <input type="text" class="form-control" name="house_no" value="{{$residents->house_no}}" required autocomplete="street">
                     </div>

                     @Error('house_no')
                     <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                  @enderror

                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="modal-body">
                        <label>Voter Status</label>
                        <select class="form-control" id="voter_status"name="voter_status" required autocomplete="voter_status">
                           
                          
                            <option value="Voter"{{$residents->voter_status=="Voter" ? 'selected' :''}}>Voter</option>
                            <option value="Non Voter"{{$residents->voter_status=="Non Voter" ? 'selected' :''}}>Non Voter</option>
                        </select>
                    </div>		

                    @Error('voter_status')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @enderror

                    </div>			
                </div>
            </div>

                
            <div class="row register-form">
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="modal-body">
                        <label>Citizenship</label>
                        <input type="text" class="form-control" name="citizenship" value="{{$residents->citizenship}}" required autocomplete="citizenship">
                    </div>	
                    
                    @Error('citizenship')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @enderror
                    
                    </div>			
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="modal-body">
                        <label>Occupation</label>
                        <input type="text" class="form-control" name="occupation" value="{{$residents->occupation}}" required autocomplete="occupation">
                    </div>	
                    
                    @Error('occupation')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @enderror

                    </div>			
                </div>

                
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="modal-body">
                            <label>Work Status</label>
                            <select class="form-control" name="work_status" value="{{old('work_status')}}" required autocomplete="work_status" value="{{old('work_status')}}">
                              <option value="Employed"{{$residents->work_status=="Employed" ? 'selected' :''}}>Employed</option>
                              <option value="Unemployed"{{$residents->work_status=="Unemployed" ? 'selected' :''}}>Unemployed</option>
                              <option value="Self-Employed"{{$residents->work_status=="Self-Employed" ? 'selected' :''}}>Self Employed</option>
                           </select>
                    </div>	
                    @Error('work_status')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @enderror

                    </div>			
                </div>
            </div>

           

            <div class="row register-form">
                <div class="col-sm-6">
                    <div class="modal-body">
                        <div class="form-group">
                        <label>Email Address</label>
                        <input type="text" class="form-control" name="email" value="{{$residents->email}}" required autocomplete="email">
                     </div>

                     @Error('email')
                     <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                  @enderror
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="modal-body">
                        <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" value="{{$residents->username}}" required autocomplete="username">
                     </div>

                     @Error('username')
                     <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                  @enderror
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="modal-body">
                        <label>Contact Number</label>
                        <input type="text" class="form-control" name="phone_number" value="{{$residents->phone_number}}" required autocomplete="phone_number">
                    </div>	
                    
                    @Error('phone_number')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @enderror
                    
                    </div>			
                </div>

            </div>
       

                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Save">
                </div>
            </form>
        </div>
     
    </div>
</div>

         
              @endforeach
            </tbody>

          </table>
          <div class="clearfix">
            {{$resident->links()}}
        </div>
    
        </div>
      </div>
      
      
      <script>
       var loadFile = function(event){
        var resident_image2 = document.getElementByID("resident_image2");
        resident_image2.src = URL.createObjectURL(event.target.files[0]);
       }
    </script>

       
{{-------------------------------------------ADD RESIDENTS---------------------------------}}
    <div id="addResidentsModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="/residents" method="POST" enctype="multipart/form-data" id="image-upload-preview">
                    @csrf

                    <div class="modal-header">						
                        <h4 class="modal-title">Add Residents</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>

                    <div class="row register-form">
                        
                            <div class="modal-body">
                                <div class="form-group">
                                <label class="labelImage">Image</label>
                                <img class="preview" id="prview" src="storage/no/-image.png"/>
                                <input type="file"  name="resident_image" id="resident_image">
                             </div>
                            
                             @Error('resident_image')
                             <p class="text-danger text-md mt-1">{{$message}}</p>
                          @enderror
                        
                       
                        </div>
                    </div>
                    
                   
                <div class="row register-form">
                    <div class="col-sm-4">
                        <div class="modal-body">					
                            <div class="form-group">
                                <label >First Name</label>
                                <input type="text" class="form-control" name="first_name" value="{{old('first_name')}}" required autocomplete="first_name">
                            
                                @Error('first_name')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="modal-body">
                            <label>Middle Name</label>
                            <input type="text" class="form-control" name="middle_name" value="{{old('middle_name')}}" required autocomplete="middle_name">
                        </div>

                        @Error('middle_name')
                            <p class="text-danger text-md mt-1">{{$message}}</p>
                         @enderror

                        </div>
                    </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="modal-body">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="last_name" value="{{old('last_name')}}" required autocomplete="last_name">
                </div>

                    @Error('last_name')
                         <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                    </div>
                </div>
            </div>
             <div class="row register-form">
                    <div class="col-sm-4">
                        <div class="modal-body">
                            <div class="form-group">
                            <label>Nickname</label>
                            <input type="text" class="form-control" name="nickname" value="{{old('nickname')}} " required autocomplete="nickname">
                         </div>

                         @Error('nickname')
                            <p class="text-danger text-md mt-1">{{$message}}</p>
                         @enderror

                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="modal-body">
                            <label>Place of Birth</label>
                            <input type="text" class="form-control" name="place_of_birth" value="{{old('place_of_birth')}}" required autocomplete="place_of_birth">
                        </div>	
                        
                        @Error('place_of_birth')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                         @enderror
                        
                        </div>			
                    </div>

                    
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="modal-body">
                            <label>Birthdate</label>
                            <input type="text" class="form-control" name="birthdate" id="datebirth" value="{{old('birthdate')}}" required autocomplete="birthdate">
                        </div>	
                        
                        @Error('birthdate')
                        <p class="text-danger text-md mt-1">{{$message}}</p>
                     @enderror

                        </div>			
                    </div>

                </div>

                <div class="row register-form">
                    <div class="col-sm-4">
                        <div class="modal-body">
                            <div class="form-group">
                            <label>Age</label>
                            <input type="text" class="form-control" name="age" id="age" value="{{old('age')}}" required autocomplete="age">
                         </div>

                         @Error('age')
                         <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror

                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="modal-body">
                            <label>Civil Status</label>
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
                        </div>	
                        
                        @Error('civil_status')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                     @enderror

                        </div>			
                    </div>

                    
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="modal-body">
                            <label>Gender</label>
                            <select class="form-control" name="gender" value="{{old('gender')}}" required autocomplete="gender">
                                <option value="">-Select Gender-</option>
                                <option value="Male"  @if (old('gender') == "Male") {{ 'selected' }} @endif >Male</option>
                                <option value="Female"  @if (old('gender') == "Female") {{ 'selected' }} @endif>Female</option>
                            </select>
                        </div>
                        
                        @Error('gender')
                        <p class="text-danger text-md mt-1">{{$message}}</p>
                     @enderror

                        </div>			
                    </div>

                </div>

                <div class="row register-form">
                    <div class="col-sm-4">
                        <div class="modal-body">
                            <div class="form-group">
                            <label>Street</label>
                            <input type="text" class="form-control" name="street" value="{{old('street')}}" required autocomplete="street">
                         </div>

                         @Error('street')
                         <p class="text-danger text-md mt-1">{{$message}}</p>
                      @enderror

                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="modal-body">
                            <div class="form-group">
                            <label>House No.</label>
                            <input type="text" class="form-control" name="house_no" value="{{old('house_no')}}" required autocomplete="house_no">
                         </div>

                         @Error('house_no')
                         <p class="text-danger text-md mt-1">{{$message}}</p>
                      @enderror

                        </div>
                    </div>
                

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="modal-body">
                            <label>Voter Status</label>
                            <select class="form-control" name="voter_status" value="{{old('voter_status')}}" required autocomplete="voter_status">
                                <option value="">-Select Voter Status-</option>
                                <option value="Voter" @if (old('voter_status') == "Voter") {{ 'selected' }} @endif>Voter</option>
                                <option value="Non Voter" @if (old('voter_status') == "Non Voter") {{ 'selected' }} @endif>Non Voter</option>
                            </select>
                        </div>		

                        @Error('voter_status')
                        <p class="text-danger text-md mt-1">{{$message}}</p>
                     @enderror

                        </div>			
                    </div>
                     </div>
                

                <div class="row register-form">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="modal-body">
                            <label>Citizenship</label>
                            <input type="text" class="form-control" name="citizenship" value="{{old('citizenship')}}" required autocomplete="citizenship">
                        </div>	
                        
                        @Error('citizenship')
                        <p class="text-danger text-md mt-1">{{$message}}</p>
                     @enderror
                        
                        </div>			
                    </div>

         
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="modal-body">
                            <label>Contact Number</label>
                            <input type="text" class="form-control" name="phone_number" value="{{old('phone_number')}}" required autocomplete="contact_number">
                        </div>	
                        
                        @Error('phone_number')
                        <p class="text-danger text-md mt-1">{{$message}}</p>
                     @enderror
                        
                        </div>			
                    </div>
            

                   
              
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="modal-body">
                            <label>Occupation</label>
                            <input type="text" class="form-control" name="occupation" value="{{old('occupation')}}" required autocomplete="occupation">
                        </div>	
                        
                        @Error('occupation')
                        <p class="text-danger text-md mt-1">{{$message}}</p>
                     @enderror

                        </div>			
                    </div>
                </div>

                <div class="row register-form">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="modal-body">
                                <label>Work Status</label>
                                <select class="form-control" name="work_status" value="{{old('work_status')}}" required autocomplete="work_status" value="{{old('work_status')}}">
                                  <option value="">-Select Work Status-</option>
                                  <option value="Employed" @if (old('work_status') == "Employed") {{ 'selected' }} @endif>Employed</option>
                                  <option value="Unemployed" @if (old('work_status') == "Unemployed") {{ 'selected' }} @endif>Unemployed</option>
                                  <option value="Self-Employed" @if (old('work_status') == "Self-Employed") {{ 'selected' }} @endif>Self Employed</option>
                               </select>
                                @Error('work_status')
                                      <p class="text-danger text-md mt-1">{{$message}}</p>
                                     @enderror
                        </div>	
                        
                        </div>			
                    </div>
                    <div class="col-sm-4">
                        <div class="modal-body">
                            <div class="form-group">
                            <label>Email Address</label>
                            <input type="text" class="form-control" name="email" value="{{old('email')}}" required autocomplete="email">
                         </div>

                         @Error('email')
                         <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="modal-body">
                            <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" value="{{old('username')}}" required autocomplete="username">
                         </div>

                         @Error('username')
                         <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="modal-body">
                            <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" value="{{old('password')}}" required autocomplete="password">
                         </div>

                         @Error('password')
                         <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror
                        </div>
                    </div>
                    <input type="hidden"  name="userType" value="1">
                    <input type="hidden"  name="status" value="1">
                </div>


             

                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                    
                </form>
                
            </div>
          
            
   </div>

        </div>
    </div> 
  </div> 
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
    $(function() {
       $("#datebirth").datepicker({
       onSelect: function(value, ui) {
           var today = new Date(),
               age = today.getFullYear() - ui.selectedYear;
           $('#age').val(age);
       },
          
       dateFormat: 'dd-mm-yy',changeMonth: true,changeYear: true,yearRange:"c-100:c+0"
       });
         
   });
     </script>


@endsection