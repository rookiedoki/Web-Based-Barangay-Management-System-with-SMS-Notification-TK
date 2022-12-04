@extends('layout.dashboard-layout')
@section('content')

<h2 class="h4 mb-1">Senior Citizen Profiling </h4>
<div class="card shadow">
    <div class="card-body">
      <div class="toolbar">
        <form class="form">
          <div class="form-row">
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
            <th>No.</th>
            <th>Name</th>
            <th>Birthdate</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Osca_No</th>
            <th>Date of Issue</th>
            <th>Action</th>
          </tr>
        </thead>

        @foreach($sen as $senior)
        <tbody>
          <tr>
            <th scope="row">{{$loop->iteration }}</th>
            <td>{{$senior->name}}</td>
            <td>{{$senior->birthdate}}</td>
            <td>{{$senior->age}}</td>
            <td>{{$senior->osca_no}}</td>
            <td>{{$senior->date_issue}}</td>
            <td>{{$senior->gender}}</td>
            <td>
                <a class="btn btn-success" href="{{url('viewSeniorProfiling',$senior->id)}}">View</a>
            </td>
          </tr>
          @endforeach
        </tbody>

      </table>
    

    </div>
  </div>

@endsection