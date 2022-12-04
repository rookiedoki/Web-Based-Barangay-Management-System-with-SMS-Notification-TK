@extends('layout.dashboard-layout')

@section('content')
<body class="hm-gradient" >

      <form method="POST" action="searchAge">
        @csrf
        <div class="form-row float-right">

            <label class="control-label col-sm-1" for="email">From:</label>
            <div class="form-group col-sm-3">
                <input type="text" class="form-control" id="search" name="from" value="1" placeholder="Search">
            </div>
            <label class="control-label col-sm-1" for="email">To:</label>
            <div class="form-group col-sm-3">
                <input type="text" class="form-control" id="search" name="to" value="100" placeholder="Search">
            </div>
            <div class="form-group col-sm-2">
                <button type="submit" class="btn" name="search"><i class="fas fa-search"></i></button>
                </div>
         </div>
          </form>

          <main>
          <button class="btn btn-info btn-border btn-round btn-sm" onclick="printDiv('printThis')">
            <i class="fa fa-print"></i>
            Print List
        </button>
       <h4>RESIDENT PROFILES BY AGE</h4>

        <div class="card mb-40 ">
                <div class="card-body" id="printThis">
                    <div class="card-body m-2" >
                        <div class="d-flex flex-wrap justify-content-around" style="border-bottom:1px solid rgb(255, 255, 255)">

                        <div class="text-center">
                            @foreach($setting as $settings)
                            <img src="{{$settings->barangay_logo ? asset ('storage/' .$settings->barangay_logo) : asset('/storage/no/-image.png')}}" class="img-fluid" width="100" style="padding-bottom: 15%">
                            @endforeach
                        </div>
                        <div class="text-center">
                            <h4 class="mb-0">Republic of the Philippines</h4>
                            <h5 class="mb-0">Province of Camarines Sur</h5>
                            <h5 class="mb-0">Municipality of Baao</h5>
                            @foreach($setting as $settings)
                            <h5 class="fw-bold mb-0">{{$settings->barangay_name}}</i></h5>
                            @endforeach
                        </div>
                        <div class="text-center">
                            @foreach($setting as $settings)
                            <img src="{{$settings->barangay_logo2 ? asset ('storage/' .$settings->barangay_logo2) : asset('/storage/no/-image.png')}}" class="img-fluid" width="100" style="padding-bottom: 15%">
                            @endforeach
                        </div>
                        </div>

                    </div>


                    <div class="col-md-12">
                        <h2 class="pt-3 pb-1 text-center font-bold font-up deep-purple-text">AGE {{$from}} - {{$to}}</h2>
                        {{-- <div class="input-group md-form form-sm form-2 pl-0" action="/searchSenior">
                            <input class="form-control my-0 py-1 pl-3 purple-border" name="search" type="text" placeholder="Search Name" aria-label="Search">
                            <span class="input-group-addon waves-effect purple lighten-2" id="basic-addon1"><a><i class="fa fa-search white-text" aria-hidden="true"></i></a></span>
                        </div> --}}
                    </div>


                    <!--Table-->
                    <table class="table table-hover">
                        <!--Table head-->
                        <thead class="mdb-color darken-3">
                            <tr class="text-white">
                                <th style="width: 10%">No</th>
                                <th style="width: 23%">Name</th>
                                <th style="width: 20%">Nickname</th>
                                <th >Age</th>
                                <th style="width: 35%; text-align:center" >Birthdate</th>
                                <th style="width: 35%; text-align:center" >Status</th>
                            </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        @foreach($findage as $findages)
                        <tbody>
                            <tr>
                                <th scope="row">{{$loop->iteration }}</th>
                                <td>{{ ucfirst($findages->last_name)}}, {{ucfirst($findages->first_name)}}  {{ucfirst(substr($findages->last_name, 0,1)) }}.</td>
                                <td>{{ucfirst($findages->nickname)}}</td>
                                <td>{{$findages->age}}</td>
                                <td style=" text-align:center">{{$findages->birthdate}}</td>
                                <td style=" text-align:center">{{$findages->civil_status}}</td>
                            </tr>
                        </tbody>
                        @endforeach
                        <!--Table body-->
                    </table>
                    <!--Table-->
                </div>
            </div>




        </div>
    </div>
        <!--MDB Tables-->
    </main>

</body>
<script>

    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
  </script>
@endsection
