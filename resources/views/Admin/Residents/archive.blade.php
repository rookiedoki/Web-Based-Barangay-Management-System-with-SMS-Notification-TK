@extends('layout.dashboard-layout')

@section('content')


<h2>Archive </i></h2>  

<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        {{-- <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa print"></i></a> --}}
      <div class="card shadow">
        <div class="card-body">
          <div class="toolbar">


           
              <div class="form-row">
                <div class="form-group col-auto mr-auto">
                <h4>List of Deleted Residents</h4>
                </div>
                <div action="/residents" class="form-group col-auto">
                  <label for="search" class="sr-only">Search</label>
                  <input type="text" class="form-control" id="search" name="search" value="" placeholder="Search"> 
                           
                </div>
              </div>
           
          </div>
          <!-- table -->
          <table class="table table-borderless table-hover">
            <thead>
              <tr>
                
                <th style="width:12%">Image</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Nickname</th>
                <th>Phone</th>
                <th style="width:12%"> Actions  </th>
              </tr>
            </thead>

            @foreach($resident as $residents)
            <form class="form" method="POST" action="{{url('restore',$residents->id)}}">
              @csrf
            <tbody>
              <tr>
                
                <td>
                  <div class="image-round">
                    <img class="imagePreview" src="{{$residents->resident_image ? asset ('storage/' .$residents->resident_image) : asset('/storage/no/-image.png')}}" alt=""  />
                  </div>
                </td>
                <td>{{$residents->first_name}}</td>
                <td>{{$residents->middle_name}}</td>
                <td>{{$residents->last_name}}</td>
                <td>{{$residents->nickname}}</td>
                <td>{{$residents->phone_number}}</td>
                <td>
                  <button type="submit" class="btn btn-primary btn-sm" >Restore</button></a>
                </td>
              </tr>
            </form>
                @endforeach
            </tbody>
          </table>
       
    
        </div>
      </div>
    </div> 
  </div> 

@endsection