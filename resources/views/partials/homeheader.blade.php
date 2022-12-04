<!doctype html>
<html lang="en">
  <head>
    <title>WBMS | Paloyon Oriental</title>
    @foreach($setting as $settings)
    <link rel="icon" href="{{$settings->barangay_logo ? asset ('storage/' .$settings->barangay_logo) : asset('/storage/no/-image.png')}}">
    @endforeach
    <link href="{{url('assets/css/User/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('assets/css/User/style.css')}}" rel="stylesheet" type="text/css"> 
    <link href="{{url('assets/css/User/font-awesome.css')}}" rel="stylesheet" type="text/css"> 
    <link href="{{url('assets/css/User/animation.css')}}" rel="stylesheet" type="text/css">
  
    <body>