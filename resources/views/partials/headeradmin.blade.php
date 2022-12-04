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
    @foreach($setting as $settings)
    <link rel="icon" href="{{$settings->barangay_logo ? asset ('storage/' .$settings->barangay_logo) : asset('/storage/no/-image.png')}}">
    @endforeach
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Barangay System</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{url('assets/css/simplebar.css')}}">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{url('assets/css/feather.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/select2.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/uppy.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/jquery.steps.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/jquery.timepicker.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/quill.snow.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/residents.css')}}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{url('assets/css/daterangepicker.css')}}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{url('assets/css/app-light.css')}}" id="lightTheme" disabled>
    <link rel="stylesheet" href="{{url('assets/css/app-dark.css')}}" id="darkTheme">
  </head>
  <body class="vertical  dark  ">
