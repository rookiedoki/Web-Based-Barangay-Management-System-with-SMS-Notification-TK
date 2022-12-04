@extends('layout.dashboard-layout')

@section('content')

 <div class="dropdown show float-right">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Non Voters
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="/votersProfiling">Voters</a>
                <a class="dropdown-item" href="/nonvotersProfiling">Non Voters</a>
            </div>
          </div>
    <main>

        <button class="btn btn-info btn-border btn-round btn-sm " onclick="printDiv('printThis')">
            <i class="fa fa-print"></i>
            Print List
        </button>

        <h2>PROFILING NONVOTERS</h2>


        <div class="card mb-4">
            <div class="card mb-4">
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
                        <h2 class="pt-3 pb-1 text-center font-bold font-up deep-purple-text">NONVOTERS PROFILES</h2>
                    </div>

                    <!--Table-->
                    <table class="table table-hover">
                        <!--Table head-->
                        <thead class="mdb-color darken-3">
                            <tr class="text-white">
                                <th style="width: 10%">#</th>
                                <th style="width: 20%">Name</th>
                                <th style="width: 15%">Age</th>
                                <th style="width: 15%">Birthday</th>
                                <th style="width: 15%">Street</th>
                                <th style="width: 15%">Civil Status</th>
                                <th style="width: 35%; text-align:center" >Voter Status</th>
                            </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        @foreach($nonvoter as $nonvoters)
                        <tbody>
                            <tr>
                                <th scope="row">{{$loop->iteration }}</th>
                                <td>{{ ucfirst($nonvoters->last_name)}}, {{ucfirst($nonvoters->first_name)}}  {{ucfirst(substr($nonvoters->last_name, 0,1)) }}.</td>
                                <td>{{$nonvoters->age}}</td>
                                <td>{{$nonvoters->birthdate}}</td>
                                <td>{{$nonvoters->street}}</td>
                                <td>{{$nonvoters->civil_status}}</td>
                                <td style=" text-align:center">{{$nonvoters->voter_status}}</td>
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
