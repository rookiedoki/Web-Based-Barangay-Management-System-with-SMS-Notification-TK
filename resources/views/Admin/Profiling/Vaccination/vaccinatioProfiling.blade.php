@extends('layout.dashboard-layout')
@section('content')

<h2 class="h4 mb-1">Vaccination Profiling </h4>
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
            <th >#</th>
            <th >Image</th>
            <th >Name</th>
            <th >Age</th>
            <th >Birthdate</th>
            <th>Name of Vaccine</th>
            <th>Action</th>
          </tr>
        </thead>

        @foreach($vacc as $vaccination)
        <tbody>
          <tr>
            <th scope="row">{{$loop->iteration }}</th>
            <td>
              <div class="image-round">
                <img class="imagePreview" src="{{$vaccination->vaccine_image ? asset ('storage/' .$vaccination->vaccine_image) : asset('/storage/images/-image.png')}}" alt=""  />
              </div>
            </td>
            <td>{{$vaccination->name}}</td>
            <td>{{$vaccination->age}}</td>
            <td>{{$vaccination->birthdate}}</td>
            <td style=" text-align:center">{{$vaccination->vaccine_type}}</td>
            <td>
                <a class="btn btn-success" href="{{url('viewVaccProfiling',$vaccination->id)}}">View</a>
            </td>
          </tr>
          @endforeach
        </tbody>

      </table>
    

    </div>
  </div>

@endsection