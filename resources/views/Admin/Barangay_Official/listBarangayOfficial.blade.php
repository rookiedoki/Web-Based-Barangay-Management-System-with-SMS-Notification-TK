@extends('layout.dashboard-layout')

@section('content')

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{url('assets/css/barangayOfficial.css')}}">
<div class="container">
    <h4>List of Barangay Officials</h4>
    <div class="row">
        @foreach($official as $officials)
        <div class="col-sm-4">
            <div class="card user-card">
                <div class="card-header">
                    <h4>{{$officials->position}}</h4>
                </div>
                <div class="card-block">
                    <div class="user-image">
                        <img src="{{$officials->official_image ? asset ('storage/' .$officials->official_image) : asset('/storage/images/-image.png')}}" class="img-radius" alt="User-Profile-Image">
                    </div>
                    <h5 class="text-official f-w-600 m-t-25 ">{{$officials->name}}</h5>
                    <p class="text-official text-muted">{{$officials->gender}} | {{$officials->age}} | {{$officials->birthdate}}</p>
                    <hr>
                    <p class="text-official text-muted m-t-15">{{$officials->email}} </p>
                    <p class="text-official text-muted m-t-15">{{$officials->phone_number}} </p>
                  
                    <hr>
                    <div class="row justify-content-center user-social-link">
                        <div class="col-auto"><a href="#editBarangayOfficial{{$officials->id}}" data-toggle="modal" ><i class="fa fa-pencil text-facebook"></i></a></div>
                        <div class="col-auto"><a href="#deleteBarangayOfficial{{$officials->id}}" data-toggle="modal"><i class="fa fa-trash text-dribbble"></i></a></div>
                    </div>
                </div>
            </div>
        </div>

           <!---------------------------------------- Delete Residents Modal HTML -------------------------------------->
           <div id="deleteBarangayOfficial{{$officials->id}}" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">						
                            <h4 class="modal-title">Delete barangay official</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
    
    
                        <div class="modal-body">					
                            <p>Are you sure you want to delete these Records?</p>
                            <p class="text-warning"><small>This action cannot be undone.</small></p>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <a class="btn btn-danger" href="{{url('deleteBarangayOfficial',$officials->id)}}">Delete</a>
                        </div>
    
                    </form>
                </div>
            </div>
        </div>

        {{-- -----------------------------------------------EDIT --------------------------------- --}}

        <div id="editBarangayOfficial{{$officials->id}}" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
             
            <form action="/updateBarangayOfficial/{{$officials->id}}" method="POST" enctype="multipart/form-data">
                 @csrf
                    @method('PUT')

            <div class="modal-header">						
                <h4 class="modal-title">Edit Barangay Officials</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="row register-form">
                
                    <div class="modal-body">
                        <div class="form-group">
                        <label class="labelImage">Image</label>
                        <img class="preview" id="preview" src="{{$officials->official_image ? asset ('storage/' .$officials->official_image) : asset('/storage/no/-image.png')}}" alt="" />
                        <input type="file"  name="official_image" id="official_image">
                     </div>
                    
                     @Error('official_image')
                     <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                  @enderror
                </div>
            </div>
            
           
        <div class="row register-form">
            <div class="col-sm-6">
                <div class="modal-body">					
                    <div class="form-group">
                        <label >Name</label>
                        <input type="text" class="form-control" name="name" value="{{$officials->name}}" required autocomplete="name">
                    
                        @Error('name')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <div class="modal-body">
                    <label>Age</label>
                    <input type="text" class="form-control" name="age" value="{{$officials->age}}" required autocomplete="age">
                </div>

                @Error('age')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @enderror

                </div>
            </div>
        </div>
        
        

     <div class="row register-form">
            <div class="col-sm-6">
                <div class="modal-body">
                    <div class="form-group">
                    <label>Birthdate</label>
                    <input type="date" class="form-control" name="birthdate" value="{{$officials->birthdate}}" required autocomplete="birthdate">
                 </div>

                 @Error('birthdate')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @enderror

                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <div class="modal-body">
                    <label>Gender</label>
                    <select class="form-control" name="gender" value="{{$officials->gender}}" required autocomplete="gender">
                        <option value="Male"{{$officials->gender=="Male" ? 'selected' :''}}>Male</option>
                        <option value="Female"{{$officials->gender=="Female" ? 'selected' :''}}>Female</option>
                    </select>
                </div>	
                
                @Error('gender')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @enderror
                
                </div>			
            </div>
        </div>

        <div class="row register-form">
            <div class="col-sm-6">
                <div class="modal-body">
                    <div class="form-group">
                    <label>Position</label>
                    <select class="form-control" name="position" value="{{$officials->position}}" required autocomplete="position">
                        <option value="Barangay Captain"{{$officials->position=="Barangay Captain" ? 'selected' :''}}>Barangay Captain</option>
                        <option value="Barangay Kagawad"{{$officials->position=="Barangay Kagawad" ? 'selected' :''}}>Barangay Kagawad</option>
                        <option value="Barangay Secretary"{{$officials->position=="Barangay Secretary" ? 'selected' :''}}>Barangay Secretary</option>
                        <option value="Barangay Treasurer"{{$officials->position=="Barangay Treasurer" ? 'selected' :''}}>Barangay Treasurer</option>
                    </select>
                 </div>

                 @Error('position')
                 <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror

                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <div class="modal-body">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" value="{{$officials->phone_number}}" required autocomplete="phone_number">
                </div>	
                
                @Error('phone_number')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
             @enderror

                </div>			
            </div>

        </div>

        <div class="row register-form">
            <div class="col-sm-12">
                <div class="modal-body">
                    <div class="form-group">
                    <label>Email Address </label>
                    <input type="text" class="form-control" name="email" value="{{$officials->email}}" required autocomplete="email">
                 </div>

                 @Error('email')
                 <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror

                </div>
            </div>
        </div>


            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-success" value="Edit">
            </div>
            
        </form>
    </div>
     
</div>
</div>
        @endforeach
	</div>
   
</div>


@endsection