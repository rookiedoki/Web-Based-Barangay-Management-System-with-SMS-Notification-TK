@extends('layout.dashboard-layout')

@section('content')



<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        {{-- <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa print"></i></a> --}}
      <div class="card shadow">
        <div class="card-body">
          <div class="toolbar">


           
              <div class="form-row">
                <div class="form-group col-auto mr-auto">
                <h2>Admin Logs</h2>
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
                <th style="width:12%">First Name</th>
                <th>Middle Name</th>
                <th>Position</th>
                <th>Description</th>
                <th style="width:12%">Date Time</th>
              </tr>
            </thead>

            @foreach($log as $logs)
            <form class="form" method="POST" action="{{url('restore',$logs->id)}}">
              @csrf
            <tbody>
              <tr>
                <td>{{$logs->firstname}}</td>
                <td>{{$logs->lastname}}</td>
                <td>{{$logs->position}}</td>
                <td>{{$logs->description}}</td>
                <td>{{$logs->date_time}}</td>
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