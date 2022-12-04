@extends('layout.dashboard-layout')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card shadow mb-4">
      <div class="card-header">
        <h2 style="padding-left: 20px; padding-top: 20px">RESIDENT PWDs PROFILE</h2>
      </div>
      <div class="card-body">
        <form  method="POST" action="/addListPWD/{{$pwdProfiling->id}}" class="col-lg-8 col-md-8 col-10 mx-auto"  >
            @csrf

            
          <div class="form-row">
                 <div class="form-group col-md-12">
                      <label for="inputPassword4">Name</label>
                      <input readonly  name="name" class="form-control" value="{{$pwdProfiling->name}}">
                </div>
          </div>
          <div class="form-row">

              <div class="form-group col-md-6">
                <label for="inputAddress">Sex</label>
                <input readonly  name="sex" class="form-control" id="inputAddress5" value="{{$pwdProfiling->sex}}">
              </div>

                  <div class="form-group col-md-6">
                    <label for="inputAddress2">Civil Status</label>
                    <input readonly  name="civil_status" class="form-control" id="inputAddress6" value="{{$pwdProfiling->civil_status}}">
                  </div>

        </div>
          <div class="form-row">
                <div class="form-group col-sm-4">
                  <label for="inputCity">birthdate</label>
                  <input readonly  name="birthdate" class="form-control" value="{{$pwdProfiling->birthdate}}">
                </div>


           <div class="form-group col-sm-4">
              <label for="inputZip">Type of Disability</label>
              <input readonly name="type_disability" class="form-control" value="{{$pwdProfiling->type_disability}}">
            </div>


                <div class="form-group col-sm-4">
                  <label for="inputZip">Cause of Disability</label>
                  <input readonly  name="cause_disablity" class="form-control" value="{{$pwdProfiling->cause_disablity}}">
                </div>
          </div>

          <button type="submit" class="btn btn-primary">Add to List</button>
        </form>
      </div> <!-- /. card-body -->
    </div> <!-- /. card -->
  </div> <!-- /. col -->
</div> <!-- /. end-section -->

@endsection