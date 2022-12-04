@extends('layout.dashboard-layout')
@section('content')


<div class="row">
    <div class="col-md-12 my-4">
      
        <div class="card shadow">
          <div class="card-body">
                
        <h1 class="text-center">Frequently Asked Questions</h2>
         @foreach ($freq_asked_title as $freq_asked_titles)
        <h5 class="text-center">{{$freq_asked_titles->frq_asked_title}}</h5>
        @endforeach

            @foreach ($freq_asked as $freq_askeds)
            <br>
            <i class="bx bx-help-circle icon-help">
            <h5> {{$freq_askeds->question}}</h5>
               
            <h5>&emsp;&emsp;{{$freq_askeds->answer}}</h5>
            @endforeach

            <a href="#add" class="btn btn-success float-right" data-toggle="modal" ><i class="fas fa-plus" ></i> <span>Add Asked Questions</span></a>
    

            <a href="#edit{{$freq_asked_titles->id}}" class="btn btn-success float-right" data-toggle="modal" ><i class="fas fa-pencil" ></i> <span>Edit</span></a>
                </div>
                
         </div>
       
    </div>
   
</div>

{{-- ----------------------Modal Edit Title----------------------- --}}
<div id="edit{{$freq_asked_titles->id}}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">

          <form action="update_freq_asked/{{$freq_asked_titles->id}}" method="POST" enctype="multipart/form-data">
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