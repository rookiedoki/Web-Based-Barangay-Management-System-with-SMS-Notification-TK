@extends('layout.dashboard-layout')
@section('content')


<body class="hm-gradient" >

    <form class="form" >
          <div class="float-right">
            <a class="btn btn-secondary" href="/seniorProfiling">
              Profiling Senior Citizen
            </a>
          </div>
    </form>

    <main>
        <button class="btn btn-info btn-border btn-round btn-sm " onclick="printDiv('printThis')">
            <i class="fa fa-print"></i>
            Print List
        </button>

        <h4 class="mb-1 pt-2">List of Registered Senior Citizen</h4>
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
                        <h3 class="pt-3 pb-1 text-center font-bold font-up deep-purple-text">List of Registered Senior Citizen</h3>
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
                                <th style="width: 5%">#</th>
                                <th style="width: 10%">Name</th>
                                <th style="width: 10%">Birthdate</th>
                                <th style="width: 10%">Age</th>
                                <th style="width: 10%">OSCA ID NO.</th>
                                <th style="width: 10%">Date of Issue</th>
                                <th style="width: 10%">Gender</th>
                            </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
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
                            </tr>
                        </tbody>
                        @endforeach
                        <!--Table body-->
                    </table>
                    <!--Table-->
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
