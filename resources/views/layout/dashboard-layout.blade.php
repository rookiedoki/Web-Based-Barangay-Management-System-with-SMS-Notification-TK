<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="favicon.ico">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    @foreach($setting as $settings)
    <title>{{$settings->barangay_name}}</title>
    @endforeach
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{url('assets/css/simplebar.css')}}">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{url('assets/css/feather.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/bootstrap-utilities.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/select2.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/uppy.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/jquery.steps.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/jquery.timepicker.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/quill.snow.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/residents.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/profiling.css')}}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{url('assets/css/daterangepicker.css')}}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{url('assets/css/app-light.css')}}" id="lightTheme" disabled>
    <link rel="stylesheet" href="{{url('assets/css/app-dark.css')}}" id="darkTheme">
    <script src="{{url('assets/js/jquery.min.js')}}"></script>
    <script src="{{url('assets/js/popper.min.js')}}"></script>
    <script src="{{url('assets/js/moment.min.js')}}"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="{{url('assets/js/simplebar.min.js')}}"></script>
    <script src='{{url('assets/js/daterangepicker.js')}}'></script>
    <script src='{{url('assets/js/jquery.stickOnScroll.js')}}'></script>
    <script src="{{url('assets/js/tinycolor-min.js')}}"></script>
    <script src="{{url('assets/js/config.js')}}"></script>
    <script src="{{url('assets/js/d3.min.js')}}"></script>
    <script src="{{url('assets/js/topojson.min.js')}}"></script>
    <script src="{{url('assets/js/datamaps.all.min.js')}}"></script>
    <script src="{{url('assets/js/datamaps-zoomto.js')}}"></script>
    <script src="{{url('assets/js/datamaps.custom.js')}}"></script>
    <script src="{{url('assets/js/Chart.min.js')}}"></script>

  </head>
  <body class="vertical">
    {{-- Use na din to For Permission Role --}}
    @php
      $user = Auth::user();
    @endphp
    {{-- End Permission Role --}}
    <div class="wrapper">
      <nav class="topnav navbar ">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
          <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
        <form class="form-inline mr-auto searchform text-muted">
          <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search1" placeholder="Type something..." aria-label="Search">
        </form>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="dark">
              <i class="fe fe-sun fe-16"></i>
            </a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <img src="{{auth()->user()->adminResidents->resident_image ? asset ('storage/' .auth()->user()->adminResidents->resident_image ) : asset('/storage/no/-image.png')}}" alt=""  class="imagePrevieww">
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">

              <a class="dropdown-item" href="#">Profile</a>
              <a class="dropdown-item" href="#">Settings</a>
              <a class="dropdown-item" href="#">Activities</a>
              <form class="inline" action="/logout" method="POST">
                @csrf
              <button class="dropdown-item" type="submit">Logout</button>
              </form>
            </div>
          </li>
        </ul>
      </nav>


  {{-- ----------------------------SIDE BAR------------------------------------------}}
      <aside class="sidebar-left" hitid="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
            @foreach($setting as $settings)
            <img src="{{$settings->system_logo ? asset ('storage/' .$settings->system_logo) : asset('/storage/no/-image.png')}}" style="width:100%; padding-top:auto; opacity:0.5; position: absolute;">
        <nav class="vertnav navbar navbar-light">
          <!-- nav bar -->
          <div class="w-100 mb-4 d-flex">
            @foreach($setting as $settings)
            <a class="mx-auto pb-2 text-center" href="/dashboard">
              <img src="{{$settings->barangay_logo ? asset ('storage/' .$settings->barangay_logo) : asset('/storage/no/-image.png')}}" style="width: 60%; padding-top:15%;">
              {{-- <p >{{$settings->barangay_name}}</p> --}}
            </a>
            @endforeach
            @endforeach
          </div>

          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="/dashboard"  aria-expanded="false" class="nav-link">
                <i class="fas fa-home fe-16"></i>
                <span class="ml-3 item-text" >Dashboard</span><span class="sr-only">(current)</span>
              </a>

            </li>
          </ul>

          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Menu</span>
          </p>

          <ul class="navbar-nav flex-fill w-100 mb-2">

            <li class="nav-item dropdown">
                <a href="../reports/accomplishment" class="nav-link">
                  <i class="fa fa-folder-open-o fe-16"></i>
                  <span class="ml-3 item-text">Compilation of Reports</span>
                </a>
            </li>
            <li class="nav-item dropdown">
              <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fas fa-user-cog"></i>
                <span class="ml-3 item-text">Barangay Officials</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="/official"><span class="ml-1 item-text">Add Barangay Officials</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="/listBrgyOfficial"><span class="ml-1 item-text">Barangay Official List</span></a>
                </li>
              </ul>
            </li>


            <li class="nav-item dropdown">
              <a href="#forms" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fa fa-users"></i>
                <span class="ml-3 item-text">Residence</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="forms">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="/residents"><span class="ml-1 item-text">Manage Residence</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="/registration"><span class="ml-1 item-text">Residence Registration</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="/archive"><span class="ml-1 item-text">Archive </span></a>
                </li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a href="#profile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fas fa-user-check"></i>
                <span class="ml-3 item-text">Profiling</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="profile">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="/listVaccinated"><span class="ml-1 item-text">Vaccination</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="/listSenior"><span class="ml-1 item-text">Senior Citizen</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="/listPWD"><span class="ml-1 item-text">PWDs</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="/listPregnant"><span class="ml-1 item-text">Pregnants</span></a>
                </li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a href="#charts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fas fa-user-tie fe-16"></i>
                <span class="ml-3 item-text">Residents Profiles</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="charts">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="/household"><span class="ml-1 item-text">Households</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="/ageProfiling"><span class="ml-1 item-text">Age</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="/votersProfiling"><span class="ml-1 item-text">Registered Voters</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="/workStatusProfiling"><span class="ml-1 item-text">Work Status</span></a>
                </li>
              </ul>
            </li>

            <p class="text-muted nav-heading mt-4 mb-1">
                <span>Services</span>
            </p>
              @php
                  $count_cert = App\Models\RequestCertificate::where('status','pending')->count();
                  $count_barangay_cert = App\Models\RequestCertificate::where('status','pending')->where('doctype','Barangay Clearance')->count();
                  $count_indigency_cert = App\Models\RequestCertificate::where('status','pending')->where('doctype','Certificate of Indigency')->count();
                  $count_residency_cert = App\Models\RequestCertificate::where('status','pending')->where('doctype','Certificate of Residency')->count();
                  $count_blotter = App\Models\Blotter::where('estado','pending')->count();

              @endphp

              @if($user->type!='Barangay Treasurer')
              @if($user->type!='Barangay Kagawad')
              <li class="nav-item dropdown">
                <a href="#tables" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                  <i class="fa fa-certificate"></i>
                  <span class="ml-3 item-text">Request Certificates  <span class="badge badge-danger ml-2 mt-1" id="total-request">@if(intval($count_cert)>0) {{$count_cert}} @endif</span></span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="tables">
                  <li class="nav-item">
                    <a class="nav-link pl-3" href="/certificateOfClearance"><span class="ml-1 item-text">Barangay Clearance <span class="badge badge-danger ml-2 mt-1" id="total-request">@if(intval($count_barangay_cert)>0) {{$count_barangay_cert}} @endif</span></span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link pl-3" href="/certificateOfResidency"><span class="ml-1 item-text">Certificate of Residency <span class="badge badge-danger ml-2 mt-1" id="total-request">@if(intval($count_residency_cert)>0) {{$count_residency_cert}} @endif</span></span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link pl-3" href="/certificateOfIndigency"><span class="ml-1 item-text">Certificate of Indigency <span class="badge badge-danger ml-2 mt-1" id="total-request">@if(intval($count_indigency_cert)>0) {{$count_indigency_cert}} @endif</span></span></a>
                  </li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link" href="/blotter">
                  <i class="fa fa-file fe-16"></i>
                  <span class="ml-3 item-text">Blotter Reports <span class="badge badge-danger ml-2 mt-1" id="total-request">@if(intval($count_blotter)>0) {{$count_blotter}} @endif</span></span>
                </a>
              </li>
              @endif
              @endif

          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Activities</span>
          </p>
          {{-- <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="/calendar">
                <i class="fe fe-calendar fe-16"></i>
                <span class="ml-3 item-text">Calendar</span>
              </a>
            </li>
          </ul> --}}
          @if($user->type!='Barangay Treasurer')
              @if($user->type!='Barangay Kagawad')
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="/announcements">
                <i class="fas fa-bullhorn "></i>
                <span class="ml-3 item-text">Announcements</span>
              </a>
            </li>

          </ul>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="/freq_asked">
                <i class="fas fa-question"></i>
                <span class="ml-3 item-text">Frequently Asked</span>
              </a>
            </li>

          </ul>

          <p class="text-muted nav-heading mt-4 mb-1">
            <span>System</span>
          </p>

          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="/settings">
                <i class="fas fa-gear"></i>
                <span class="ml-3 item-text">Settings</span>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#contact" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fas fa-user-lock"></i>
                <span class="ml-3 item-text">Admins</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="contact">
                <a class="nav-link pl-3" href="/manageAdmin"><span class="ml-1">Manage Admins</span></a>
                {{-- <a class="nav-link pl-3" href="/admin_logs"><span class="ml-1">Admin Logs</span></a> --}}
              </ul>
            </li>
          </ul>

          @endif
          @endif
           <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item w-100">
          <a class="nav-link" href="/activitylog">
            <i class="fas fa-tools fe-16"></i>
            <span class="ml-3 item-text">Activity Logs</span>
          </a>
        </li>
      </ul>
        </nav>
      </aside>

      {{-- --------------------------------CONTENT------------------------------------------ --}}
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row align-items-center mb-2">
                <div class="col">

                 @if(session()->has('message'))
                  <div class="alert alert-primary" id="alert">
                  <button type="button" class="close" data-dismiss="alert">x</button>
                  {{session()->get('message')}}

                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-danger">
                  <ul class="border border-t-0 border-black-400 rounded-b bg-black-100 px-4 py-text-red-700">
                    @foreach($errors->all() as $error)
                    <li>
                      {{$error}}
                    </li>
                    @endforeach
                  </ul>
                </div>
                @endif


                  @yield('content')

                </div>
              </div>
    {{-- --------------------------------END OF CONTENT--------------------------------------- --}}

            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="list-group list-group-flush my-n3">
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-box fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Package has uploaded successfull</strong></small>
                        <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                        <small class="badge badge-pill badge-light text-muted">1m ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-download fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Widgets are updated successfull</strong></small>
                        <div class="my-0 text-muted small">Just create new layout Index, form, table</div>
                        <small class="badge badge-pill badge-light text-muted">2m ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-inbox fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Notifications have been sent</strong></small>
                        <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                        <small class="badge badge-pill badge-light text-muted">30m ago</small>
                      </div>
                    </div> <!-- / .row -->
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-link fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Link was attached to menu</strong></small>
                        <div class="my-0 text-muted small">New layout has been attached to the menu</div>
                        <small class="badge badge-pill badge-light text-muted">1h ago</small>
                      </div>
                    </div>
                  </div> <!-- / .row -->
                </div> <!-- / .list-group -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body px-5">
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-success justify-content-center">
                      <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Control area</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Activity</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Droplet</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Upload</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-users fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Users</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Settings</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main> <!-- main -->
    </div> <!-- .wrapper -->

    <script>
      /* defind global options */
      Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
      Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="{{url('assets/js/gauge.min.js')}}"></script>
    <script src="{{url('assets/js/jquery.sparkline.min.js')}}"></script>
    <script src="{{url('assets/js/apexcharts.min.js')}}"></script>
    <script src="{{url('assets/js/apexcharts.custom.js')}}"></script>
    <script src='{{url('assets/js/jquery.mask.min.js')}}'></script>
    <script src='{{url('assets/js/select2.min.js')}}'></script>
    <script src='{{url('assets/js/jquery.steps.min.js')}}'></script>
    <script src='{{url('assets/js/jquery.validate.min.js')}}'></script>
    <script src='{{url('assets/js/jquery.timepicker.js')}}'></script>
    <script src='{{url('assets/js/dropzone.min.js')}}'></script>
    <script src='{{url('assets/js/uppy.min.js')}}'></script>
    <script src='{{url('assets/js/quill.min.js')}}'></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="{{url('assets/js/apps.js')}}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>

<script type="text/javascript">

  $("document").ready(function()

  {

    setTimeout(function()
      {
        $("div.alert").remove();
      },3000);
  });

  </script>
  @yield('script')
  </body>
</html>
