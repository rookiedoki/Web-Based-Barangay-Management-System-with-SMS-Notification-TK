@extends('layout.dashboard-layout')

@section('content')

<div class="col-md-10 mx-auto">
<div class="card shadow">
    <div class="card-body">
        <div class="toolbar">
            <form action="/storeOfficial" method="POST" enctype="multipart/form-data" id="image-upload-preview"  class="col-lg-11 col-md-8 col-10 mx-auto" >
                @csrf

                <div class="modal-header">						
                    <h4 class="modal-title">Add Barangay Officials</h4>
                    
                </div>

                <div class="row register-form">
                    
                        <div class="modal-body">
                            <div class="form-group">
                            <label class="labelImage">Image</label>
                            <img class="preview" id="prview" src="storage/no/-image.png"/>
                            <input type="file"  name="official_image" id="official_image">
                         </div>
                        
                         @Error('official_image')
                         <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror
                    </div>
                </div>
                
                <div class="col-sm-12">
                    <div class="modal-body">					
                        <div class="form-group">
                            <label >Name</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}" required autocomplete="name">
                        
                            @Error('name')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="modal-body">
                        <label>Age</label>
                        <input type="text" class="form-control" name="age" value="{{old('age')}}" required autocomplete="age">
                    </div>

                    @Error('age')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                     @enderror

                    </div>
                </div>
       
                <div class="col-sm-12">
                    <div class="modal-body">
                        <div class="form-group">
                        <label>Birthdate</label>
                        <input type="date" class="form-control" name="birthdate" value="{{old('birthdate')}} " required autocomplete="birthdate">
                     </div>

                     @Error('birthdate')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                     @enderror

                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="modal-body">
                        <label>Gender</label>
                        <select class="form-control" name="gender" value="{{old('gender')}}" required autocomplete="gender">
                            <option value="">-Select Gender-</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>	
                    
                    @Error('gender')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                     @enderror
                    
                    </div>			
                </div>
          
                <div class="col-sm-12">
                    <div class="modal-body">
                        <div class="form-group">
                        <label>Position</label>
                        <select class="form-control" name="position" value="{{old('position')}}" required autocomplete="position">
                            <option value="">-Position-</option>
                            <option value="Barangay Captain">Barangay Captain</option>
                            <option value="Barangay Kagawad">Barangay Kagawad</option>
                            <option value="Barangay Secretary">Barangay Secretary</option>
                            <option value="Barangay Treasurer">Barangay Treasurer</option>
                        </select>
                     </div>

                     @Error('position')
                     <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                  @enderror

                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="modal-body">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="phone_number" value="{{old('phone_number')}}" required autocomplete="phone_number">
                    </div>	
                    
                    @Error('phone_number')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @enderror

                    </div>			
                </div>

                <div class="col-sm-12">
                    <div class="modal-body">
                        <div class="form-group">
                        <label>Email Address </label>
                        <input type="text" class="form-control" name="email" value="{{old('email')}}" required autocomplete="email">
                     </div>

                     @Error('email')
                     <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                  @enderror

                    </div>
                </div>
           
                <div class="modal-footer">
                    <a class="btn btn-danger" href="/listBrgyOfficial">Back</a>
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
                
            </form>
        </div>
    </div>
</div>
</div>


            <script>
                official_image.onchange = evt => {
                  const [file] = official_image.files
                  if (file) {
                    prview.style.visibility = 'visible';
                
                    prview.src = URL.createObjectURL(file)
                  }
                }
            </script>
            
    

@endsection