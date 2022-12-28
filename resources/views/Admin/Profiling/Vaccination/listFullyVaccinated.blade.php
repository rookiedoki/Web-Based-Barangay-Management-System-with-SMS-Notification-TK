@extends('layout.dashboard-layout')
@section('content')

<body class="hm-gradient" >

    <form class="form" action="/searchStatus">

            
          <div class="float-right">
            <a class="btn btn-secondary" href="/vaccProfiling">
              Vaccination Profiling
            </a>
          </div>
          
          <div class="dropdown show float-right">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Fully Vaccinated
            </a>
          
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="/listVaccinated">Partially Vaccinated</a>
              <a class="dropdown-item" href="/listFullyVaccinated">Fully Vaccinated</a>
              <a class="dropdown-item" href="/listBoosterVaccinated">With Booster</a>
            </div>
          </div>


     
    </form>

    <main>
        
        <button class="btn btn-info btn-border btn-round btn-sm " onclick="printDiv('printThis')">
            <i class="fa fa-print"></i>
            Print List
        </button>
 
        <h2 class="mb-1 pt-2">Vaccinated</h2>
      
       
     
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
                            <img src="{{$settings->barangay_logo ? asset ('storage/' .$settings->barangay_logo) : asset('/storage/no/-image.png')}}"class="img-fluid" width="100">          
                            @endforeach
                        </div>
                        </div>
            
                    </div>

                    <div class="col-md-12">
                        <h2 class="pt-3 pb-1 text-center font-bold font-up deep-purple-text">LIST OF FULLY VACCINATED</h2>
                    </div>


                    <!--Table-->
                    <table class="table table-hover">
                        <!--Table head-->
                        <thead class="mdb-color darken-3">
                            <tr class="text-white">
                                <th style="width: 5%">#</th>
                                <th style="width: 12%">Name</th>
                                <th style="width: 5%">Age</th>
                                <th style="width: 12%">Birthdate</th>
                                <th style="width: 15%">Name of Vaccine</th>
                                <th style="width: 10%">First Dose Date</th>
                                <th style="width: 10%">Second Dose Date</th>
                                <th style="width: 12%">Status</th>
                            </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        @foreach($vacc as $vaccinated)
                        <tbody>
                            <tr>
                                <th scope="row">{{$loop->iteration }}</th>
                                <td>{{$vaccinated->name}}</td>
                                <td>{{$vaccinated->age}}</td>
                                <td>{{$vaccinated->birthdate}}</td>
                                <td>{{$vaccinated->vaccine_type}}</td>
                                <td>{{$vaccinated->date_first}}</td>
                                <td>{{$vaccinated->date_second}}</td>
                                <td>{{$vaccinated->dose}}</td>
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