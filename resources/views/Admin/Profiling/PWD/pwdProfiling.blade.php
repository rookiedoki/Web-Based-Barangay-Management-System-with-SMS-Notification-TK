@extends('layout.dashboard-layout')
@section('content')

<h2 class="h4 mb-1">PWDs Profiling </h4>
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
            <th>Sex</th>
            <th>Civil Status</th>
            <th>Birthdate</th>
            <th>Type of Disability</th>
            <th>Cause of Disability</th>
            <th>Action</th>
          </tr>
        </thead>

        @foreach($pwd as $pwds)
        <tbody>
          <tr>
            <th scope="row">{{$loop->iteration }}</th>
            <td>{{$pwds->name}}</td>
            <td>{{$pwds->sex}}</td>
            <td>{{$pwds->civil_status}}</td>
            <td>{{$pwds->birthdate}}</td>
            <td>@php $type_disability = json_decode($pwds->type_disability)@endphp
              @foreach($type_disability as $type_disabilities)
              {{$type_disabilities}},
              @endforeach
          </td>
          <td>@php $cause_disablity = json_decode($pwds->cause_disablity)@endphp
              @foreach($cause_disablity as $cause_disabilities)
              {{$cause_disabilities}},
              @endforeach
          </td>
            <td>
                <a class="btn btn-success" href="{{url('viewPWDProfiling',$pwds->id)}}">View</a>
            </td>
          </tr>
          @endforeach
        </tbody>

      </table>
    

    </div>
  </div>

@endsection