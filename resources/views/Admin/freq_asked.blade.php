@extends('layout.dashboard-layout')
@section('content')


<div class="row">
    <div class="col-md-12 my-4">
      
        <div class="card shadow">
          <div class="card-body">
                
        <h1 class="text-center">Frequently Asked Questions</h2>
         @foreach ($freq_asked_title as $freq_asked_titles )
        <h5 class="text-center">{{$freq_asked_titles->frq_asked_title}}<a href="#edit{{$freq_asked_titles->id}}" class="edit" style="color: aqua" data-toggle="modal"><i class="material-icons"  title="Edit">&#xE254;</i></a> </h5>
       
        {{-- ----------------------Modal Edit Title----------------------- --}}
        <div id="edit{{$freq_asked_titles->id}}" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
        
                  <form action="update_freq_asked_title/{{$freq_asked_titles->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                   
                        <div class="modal-header">						
                            <h4 class="modal-title">Edit</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        
                        
                    <div class="row register-form">
                        <div class="col-sm-12">
                            <div class="modal-body">					
                                <div class="form-group">
                                      
                                    <label >Title</label>                    
                                    <textarea  class="form-control" rows="5" cols="50" name="frq_asked_title" value="{{$freq_asked_titles->frq_asked_title}}"> {{$freq_asked_titles->frq_asked_title}} </textarea>
                       
                                </div>
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

            @foreach ($freq_asked as $freq_askeds)
            <br>
            <i class="bx bx-help-circle icon-help">
            <h5> {{$freq_askeds->question}} <a href="#edit{{$freq_askeds->id}}" class="edit" style="color: aqua" data-toggle="modal"><i class="material-icons"  title="Edit">&#xE254;</i></a>  <a href="{{url('delete_freq_asked',$freq_askeds->id)}}"  style="color: red" ><i class="material-icons" style="margin-left:10px" title="Delete">&#xE872;</i></a></h5>
                                    {{-- <a class="btn btn-danger" href="{{url('deleteResidents',$residents->id)}}">Delete</a> --}}
            <h5>&emsp;&emsp;{{$freq_askeds->answer}}</h5>
            @endforeach

            <a href="#add" class="btn btn-success float-right" data-toggle="modal" ><i class="fas fa-plus" ></i> <span>Add Asked Questions</span></a>
    
            {{-- <a href="#edit{{$freq_askeds->id}}" class="btn btn-success float-right" data-toggle="modal" ><i class="fas fa-pencil" ></i> <span>Edit</span></a> --}}
                </div>
                
         </div>
    </div>
</div>

@foreach ($freq_asked as $freq_askeds)
{{-- ----------------------Modal Edit ----------------------- --}}
<div id="edit{{$freq_askeds->id}}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">

          <form action="update_freq_asked/{{$freq_askeds->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
           
                <div class="modal-header">						
                    <h4 class="modal-title">Edit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                
                
            <div class="row register-form">
                <div class="col-sm-12">
                    <div class="modal-body">					
                        <div class="form-group">
                         
                            <label >Question</label>                    
                            <textarea  class="form-control" rows="5" cols="50" name="question" value="{{$freq_askeds->question}}"> {{$freq_askeds->question}} </textarea>
               
                        </div>
                        <div class="form-group">
                         
                            <label >Answer</label>                    
                            <textarea  class="form-control" rows="5" cols="50" name="answer" value="{{$freq_askeds->answer}}"> {{$freq_askeds->answer}} </textarea>
               
                        </div>
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
{{-- ----------------------Modal Add----------------------- --}}

<div id="add" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/store_freq_asked" method="POST" enctype="multipart/form-data">
                @csrf
                <h1 class="text-center">Frequently Asked Questions</h2>
                    <div class="form-group ">
                        <h5>Question </h5>
                    <textarea class="form-control" type="text" name="question"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <h5>Answer </h5>
                    <textarea class="form-control" id="example-date" type="text" name="answer"></textarea>
                    </div> 
                    <input type="submit" class="btn btn-success" value="Save">
                </form>
                </div>
            </div>
        </div>
@endsection