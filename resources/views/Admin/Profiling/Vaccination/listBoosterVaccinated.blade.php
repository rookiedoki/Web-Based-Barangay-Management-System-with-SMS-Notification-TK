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
              With Booster
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
                        <h2 class="pt-3 pb-1 text-center font-bold font-up deep-purple-text">LIST OF FULLY VACCINATED WITH BOOSTER</h2>
                    </div>


                    <!--Table-->
                    <table class="table table-hover">
                        <!--Table head-->
                        <thead class="mdb-color darken-3">
                            <tr class="text-white">
                                <th style="font-size:13px">#</th>
                                <th style="font-size:13px">Name</th>
                                <th style="font-size:13px">Age</th>
                                <th style="font-size:13px">Birthdate</th>
                                <th style="font-size:13px">Vaccine</th>
                                <th style="font-size:13px">First Dose Date</th>
                                <th style="font-size:13px">Second Dose Date</th>
                                <th style="font-size:13px">1st Booster Vaccine</th>
                                <th style="font-size:13px">2nd Booster Vaccine</th>
                                <th style="font-size:13px">1st Booster Vaccine</th>
                                <th style="font-size:13px">Status</th>
                            </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        @foreach($vacc as $vaccinated)
                        <tbody>
                            <tr>
                                <th scope="row">{{$loop->iteration }}</th>
                                <td style="font-size:13px">{{$vaccinated->name}}</td>
                                <td style="font-size:13px">{{$vaccinated->age}}</td>
                                <td style="font-size:13px">{{$vaccinated->birthdate}}</td>
                                <td style="font-size:13px">{{$vaccinated->vaccine_type}}</td>
                                <td style="font-size:13px">{{$vaccinated->date_first}}</td>
                                <td style="font-size:13px">{{$vaccinated->date_second}}</td>
                                <td style="font-size:13px">{{$vaccinated->first_booster_date}}</td>
                                <td style="font-size:13px">{{$vaccinated->second_booster_date}}</td>
                                <td style="font-size:13px">{{$vaccinated->date_second}}</td>
                                <td style="font-size:13px">{{$vaccinated->dose}}</td>
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