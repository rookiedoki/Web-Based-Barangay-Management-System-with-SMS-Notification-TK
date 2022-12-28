@extends('layout.dashboard-layout')

@section('content')

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{url('assets/css/barangayOfficial.css')}}">
<div class="container">
    <h4>Manage Admin</h4>
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
                    <h5 class="text-official f-w-600 m-t-25 ">{{ $officials->name }}</h5>
                    <p class="text-official text-muted">{{$officials->gender}} | {{$officials->age}} | {{$officials->birthdate}}</p>
                    <hr>
                    <p class="text-official text-muted m-t-15">{{$officials->email}} </p>
                    <p class="text-official text-muted m-t-15">{{$officials->phone_number}} </p>
                  
                    <hr>
                    <div class="row justify-content-center user-social-link">
                        @if($officials->status==1)
                        <div class="col-auto" style="color: cyan"><span>ADMIN</span></div>
                        @else
                        <div class="col-auto"><a href="#addAdminModal{{$officials->id}}" class="btn btn-danger" data-toggle="modal" > <span>Add As New Admin</span></a></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

            {{-- -------------------Modal Verificaton------------------------------------ --}}
                        <div id="addAdminModal{{$officials->id}}" class="modal fade">
                                 <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{url('addAdmin',$officials->id)}}" method="POST" enctype="multipart/form-data">
                                                @csrf

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
                                            </form>
                                        </div>
                                  </div>
                            </div>   

        {{--------------------------------------------------EDIT ------------------------------------}}

        {{-- <div id="addAdminModal{{$officials->id}}" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
             
            <form action="/addAdmin/{{$officials->id}}" method="POST" enctype="multipart/form-data">
                 @csrf

            <div class="modal-header">						
                <h4 class="modal-title">Create Account for Admin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

        <div class="row register-form">
            <div class="col-sm-12">
                <div class="modal-body">					
                    <div class="form-group">
                        <label >Username</label>
                        <input type="text" class="form-control" name="username"  required autocomplete="username">
                    
                        @Error('username')
                            <p class="text-danger text-md mt-1">{{$message}}</p>
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
                        <input type="password" class="form-control" name="password"  required autocomplete="password">
                    
                        @Error('password')
                            <p class="text-danger text-md mt-1">{{$message}}</p>
                        @enderror
                    
                    </div>
                </div>
            </div>
        </div>
        <div class="row register-form">
            <div class="col-sm-12">
                <div class="modal-body">					
                    <div class="form-group">
                        <label >Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation"  required autocomplete="password_confirmation">
                    
                        @Error('password_confirmation')
                            <p class="text-danger text-md mt-1">{{$message}}</p>
                        @enderror
                    
                    </div>
                </div>
            </div>
        </div>
   
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-success" value="Add">
            </div>
            
        </form>
    </div>
     
</div>
</div> --}}
        @endforeach
	</div>
   
</div>


@endsection