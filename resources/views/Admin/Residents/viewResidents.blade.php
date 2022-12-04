@extends('layout.dashboard-layout')

@section('content')

<body class="hm-gradient" >

    <main>
        <div class="col-auto">
        <button class="btn btn-info btn-border btn-round btn-sm " onclick="printDiv('printThis')">
            <i class="fa fa-print"></i>
            Print List
        </button>

        <h2>View Residents Profile</h2>
        </div>

        <div class="container mt-4" >
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


                        <div class="container">


                            <div id="content" class="content p-0" >
                                <div class="profile-header" >


                                    <div class="profile-header-content">

                                              <img class="img-view"src="{{$resident->resident_image ? asset ('storage/' .$resident->resident_image) : asset('/storage/images/-image.png')}}" alt=""  />


                                        <div class="profile-header-info">
                                            <h4 class="m-t-sm">{{$resident->first_name}} {{$resident->last_name}}</h4>
                                        </div>
                                    </div>


                                </div>


                        <div class="col-lg-12 col-md-12 col-sm-8" style="border-bottom:1px solid black; font-size:20px; ">

                            <span class="fw-bold text-left" style="font-size:15px">BASIC INFORMATION</span>
                            </div>
                         <br>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <h6 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">First Name:</h6>
                                        <div class="col-lg-8 col-md-8 col-sm-8" style="border-bottom:1px solid black; font-size:20px">

                                        <span class="fw-bold text-left" style="font-size:15px"> {{$resident->first_name}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <h6 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Middle Name:</h6>
                                        <div class="col-lg-8 col-md-8 col-sm-8" style="border-bottom:1px solid black; font-size:20px"">
                                            <span class="fw-bold" style="font-size:15px">{{$resident->middle_name}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <h6 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Last Name:</h6>
                                        <div class="col-lg-8 col-md-8 col-sm-8" style="border-bottom:1px solid black; font-size:20px"">
                                            <span class="fw-bold" style="font-size:15px">{{$resident->last_name}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <h6 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Nickname:</h6>
                                        <div class="col-lg-8 col-md-8 col-sm-8" style="border-bottom:1px solid black; font-size:20px"">
                                            <span class="fw-bold" style="font-size:15px">{{$resident->nickname}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <h6 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Gender:</h6>
                                        <div class="col-lg-8 col-md-8 col-sm-8" style="border-bottom:1px solid black; font-size:20px"">
                                            <span class="fw-bold" style="font-size:15px">{{$resident->gender}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <h6 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Age:</h6>
                                        <div class="col-lg-8 col-md-8 col-sm-8" style="border-bottom:1px solid black; font-size:20px"">
                                            <span class="fw-bold" style="font-size:15px">{{$resident->age}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <h6 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Birthdate:</h6>
                                        <div class="col-lg-8 col-md-8 col-sm-8" style="border-bottom:1px solid black; font-size:20px"">
                                            <span class="fw-bold" style="font-size:15px">{{$resident->birthdate}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <h6 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Occupation:</h6>
                                        <div class="col-lg-8 col-md-8 col-sm-8" style="border-bottom:1px solid black; font-size:20px"">
                                            <span class="fw-bold" style="font-size:15px">{{$resident->occupation}}</span>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <br>
                            <div class="col-lg-12 col-md-12 col-sm-8" style="border-bottom:1px solid black; font-size:20px; ">

                                <span class="fw-bold text-left" style="font-size:15px">CONTACT INFORMATION</span>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <h6 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Email:</h6>
                                            <div class="col-lg-8 col-md-8 col-sm-8" style="border-bottom:1px solid black; font-size:20px">

                                            <span class="fw-bold text-left" style="font-size:15px"> {{$resident->email}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <h6 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Contact Number:</h6>
                                            <div class="col-lg-8 col-md-8 col-sm-8" style="border-bottom:1px solid black; font-size:20px">
                                                <span class="fw-bold" style="font-size:15px">{{$resident->phone_number}}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    </div>

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
