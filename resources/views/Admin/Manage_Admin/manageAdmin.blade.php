@extends('layout.dashboard-layout')

@section('content')
<h1>Manage Admins</h1>  

<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        {{-- <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa print"></i></a> --}}
      <div class="card shadow">
        <div class="card-body">
          <div class="toolbar">
            <form class="form">
              <div class="form-row">
                <div class="form-group col-auto mr-auto">

                  <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addAdminsModal"><i class="fas fa-plus" ></i> <span>Add New Admin</span></a>
              
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
                
                <th style="width:12%">No</th>
                <th style="width:12%">Image</th>
                <th style="width:15%">Name</th>
                <th style="width:18%">Email</th>
                <th style="width:18%">Position</th>
                <th style="width:12%"> Actions  </th>
              </tr>
            </thead>

          @foreach($ad as $admin)
            <tbody>
              <tr>
            <th scope="row">{{$loop->iteration }}</th>
            <td> <img class="imagePreview" src="{{$admin->admin_image ? asset ('storage/' .$admin->admin_image) : asset('/storage/no/-image.png')}}" alt=""  /></td>
               <td>{{$admin->first_name}} {{$admin->last_name}}</td>
                <td>{{$admin->email}}</td>
                <td>{{$admin->position}}</td>
                <td>
                    <a href="#deleteAnnouncementModal{{$admin->id}}" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                 </td>
              </tr> 

              
      
                <!---------------------------------------- Delete Residents Modal HTML -------------------------------------->
                {{-- <div id="deleteAnnouncementModal{{$announcements->id}}" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form>
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
                                    <input type="submit" href="{{url('deleteResidents', $announcements->id)}}" class="btn btn-danger" value="Delete">
                                  <a class="btn btn-danger" href="{{url('deleteAnnouncements',$announcements->id)}}">Delete</a>
                                </div>
            
                            </form>
                        </div>
                    </div>
                </div>   --}}



       
                @endforeach
            </tbody>

          </table>

   
        </div>
      </div>
    
   {{-- -----------------------------------Add Admins-------------------------------------- --}}
     
   <div id="addAdminsModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="/addAdmin" method="POST" enctype="multipart/form-data" id="image-upload-preview">
                    @csrf
 
                    <div class="modal-header">						
                        <h4 class="modal-title">Add Admins</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>

                     <div class="row register-form">
                    
                        <div class="modal-body">
                            <div class="form-group">
                            <label class="labelImage">Image</label>
                            <img class="preview" id="prview" src="storage/no/-image.png"/>
                            <input type="file"  name="admin_image" id="admin_image">
                         </div>
                        
                         @Error('admin_image')
                         <p class="text-danger text-xs mt-1">{{$message}}</p>
                      @enderror
                    </div>
                </div>
                    
                   
                <div class="row register-form">
                    <div class="col-sm-12">
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
                </div>
                
                <div class="row register-form">
                    <div class="col-sm-12">
                        <div class="modal-body">					
                            <div class="form-group">
                                <label >Last Name</label>
                                <input type="text" class="form-control" name="last_name" value="{{old('last_name')}}" required autocomplete="last_name">
                            
                                @Error('last_name')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row register-form">
                    <div class="col-sm-12">
                        <div class="modal-body">					
                            <div class="form-group">
                                <label >Position</label>
                                <select class="form-control" name="position" value="{{old('position')}}" required autocomplete="position">
                                    <option value="">-Position-</option>
                                    <option value="Barangay Captain">Barangay Captain</option>
                                    <option value="Barangay Kagawad">Barangay Kagawad</option>
                                    <option value="Barangay Secretary">Barangay Secretary</option>
                                    <option value="Barangay Treasurer">Barangay Treasurer</option>
                                </select>
                            
                                @Error('position')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            
                            </div>
                        </div>
                    </div>
                </div>

                      
                <div class="row register-form">
                    <div class="col-sm-12">
                        <div class="modal-body">					
                            <div class="form-group">
                                <label >Email</label>
                                <input type="email" class="form-control" name="email" value="{{old('email')}}" required autocomplete="email">
                            
                                @Error('email')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row register-form">
                    <div class="col-sm-12">
                        <div class="modal-body">					
                            <div class="form-group">
                                <label >Password</label>
                                <input type="password" class="form-control" name="password" value="{{old('password')}}" required autocomplete="password">
                            
                                @Error('password')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden"  name="userType" value="0">
                
          

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

@endsection
