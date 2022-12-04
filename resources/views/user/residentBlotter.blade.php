<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, maximum-scale=1">

  <head>
    <title>WBMS | Paloyon Oriental</title>
    @foreach($setting as $settings)
    <link rel="icon" href="{{$settings->barangay_logo ? asset ('storage/' .$settings->barangay_logo) : asset('/storage/no/-image.png')}}">
    @endforeach
    <link href="{{url('assets/css/User/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    {{-- <link href="{{url('assets/css/User/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('assets/css/User/font-awesome.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('assets/css/User/animation.css')}}" rel="stylesheet" type="text/css"> --}}
  </head>
  <style>
    #alert-positive {
    background: rgb(118, 240, 149);
    top: 10px;
    border-left-color: rgb(1, 241, 61);
    border-left-width: 10px;
    border-radius: 4px;
    color: black;
    font-size: 13px;
    }
    .navbar{
        margin-bottom: 0 !important;
    }
    .ftco-section{
        font-size: 15px !important;
    }
    input, textarea, select{
        font-size: 15px !important;
    }
    button{
        width: 30% !important;
        font-size: 15px !important;
    }
  </style>
  @include('partials.header')
<!--Header_section-->
  <!-- ======= Header ======= -->
  <header id="header2" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="/home" class="logo me-auto">
        @foreach($setting as $settings)
        <img src="{{$settings->barangay_logo ? asset ('storage/' .$settings->barangay_logo) : asset('/storage/no/-image.png')}}" class="img-fluid" width="70px" style="padding:5px;">
        @endforeach
      </a>
      {{-- <h1 class="logo me-auto"><a href="index.html">WBMS | Paloyon Oriental</a></h1> --}}
      <!-- Uncomment below if you prefer to use an image logo -->

      <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link scrollto active" href="/">Home</a></li>
            <li><a class="nav-link scrollto" href="/.#about">About</a></li>
            <li class="dropdown"><a href="/.#services"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="/request">Barangay Certificates</a></li>
                <li><a href="/residentBlotter">Report a Blotter</a></li>
              </ul>
            </li>
            <li><a class="nav-link scrollto" href="/.#portfolio">Portfolio</a></li>
            <li><a class="nav-link scrollto" href="/.#team">Officials</a></li>
            <li><a class="nav-link scrollto" href="/.#contact">Contact</a></li>
            {{-- <li><a class="getstarted scrollto" href="#about">Get Started</a></li> --}}
          </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->

    </div>
  </header><!-- End Header -->

<!--Header_section-->

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <h2><center>Report Complaints</center></h2>
      </div>
    </section>
    <!-- End Breadcrumbs -->

    <div class="container">
    <div class="row justify-content-center">
      <div class="col-10">
        @if(session()->has('message-negative'))
        <div class="alert" id="alert-negative">
          {{session()->get('message-negative')}}
        </div>
        @endif
        @if(session()->has('message-positive'))
        <div class="alert" id="alert-positive">
          {{session()->get('message-positive')}}
        </div>
        @endif
        </div>
      </div>
    </div>

    <section class="inner-page">
        <form action="/requestBlotter/send" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-10">
                       <div class="col-lg-12 col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                  <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2"><i class="bi bi-person-fill"></i></span>
                                    <input type="text" class="form-control" placeholder="Enter Complainant Name" name="complainant" required>
                                  </div>
                                </div><br />
                                <div class="col-md-6">
                                  <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2"><i class="bi bi-person-square"></i></span>
                                    <input type="text" class="form-control" placeholder="Enter Respondent Name" name="respondent" required>
                                  </div>
                                </div>
                              </div><br />
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2"><i class="bi bi-people-fill"></i></span>
                                    <input type="text" class="form-control" placeholder="Enter Victim(s) Name" name="victim" required>
                                  </div>
                                </div><br />
                                <div class="col-md-6">
                                  <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2"><i class="bi bi-geo-alt-fill"></i></span>
                                    <input type="text" class="form-control" placeholder="Enter Location" name="location" required>
                                  </div>
                                </div>
                              </div><br />
                                <div class="row">
                                <div class="col-md-6">
                                  <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2"><i class="bi bi-calendar-plus-fill"></i></span>
                                    <input type="date" class="form-control" name="date" required>
                                  </div>
                                </div><br />
                                <div class="col-md-6">
                                  <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2"><i class="bi bi-clock-fill"></i></span>
                                    <input type="time" class="form-control" name="time" required>
                                  </div>
                                </div>
                            </div><br />
                            <div class="row">
                                <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2"><i class="bi bi-image-fill"></i></span>
                                    <input type="file" name="proof" class="form-control" id="proof" multiple="multiple" />
                                    @Error('proof')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                   </div>
                                </div>
                            </div><br />
                            <div class="row">
                              <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2"><i class="bi bi-pen-fill"></i></span>
                                  <textarea class="form-control" placeholder="Enter Blotter or Incident here..." name="details" required></textarea>
                                </div>
                              </div>
                            </div><br />

                              <div class="col">
                                <center>
                                <button type="text" name="submit" class="btn btn-primary">SUBMIT</button>
                                </center>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

    </section>

  </main><!-- End #main -->
  <script type="text/javascript">

    $("document").ready(function()
    {
      setTimeout(function()
        {
          $("div.alert").remove();
        },3000);
    });
 </script>

@include('partials.footer')
