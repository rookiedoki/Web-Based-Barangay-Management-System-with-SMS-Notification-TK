<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @foreach($setting as $settings)
    <title>{{$settings->barangay_name}}</title>
    @endforeach
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<style>
  body{
    background-image: url("assets/b2.jpg");
    background-size: 100%;
}

.registration-form{
	padding: 50px 0;
}

.registration-form form{
    background-color: rgba(15, 3, 3, 0.644);
    max-width: 500px;
    margin: auto;
    padding: 50px 70px;
    border-radius: 30px;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
}

.registration-form .form-icon{
	text-align: center;
    display: block;
    background-color: #5891ff;
    border-radius: 50%;
    font-size: 40px;
    color: white;
    width: 120px;
    height: 120px;
    margin: auto;
    margin-bottom: 50px;
    line-height: 100px;
}

.registration-form .item{
	border-radius: 20px;
    margin-bottom: 25px;
    padding: 10px 20px;
}

.registration-form .create-account{
    border-radius: 30px;
    padding: 10px 20px;
    font-size: 18px;
    font-weight: bold;
    background-color: #5791ff;
    border: none;
    color: white;
    margin-top: 20px;
}



@media (max-width: 576px) {
    .registration-form form{
        padding: 50px 20px;
    }

    .registration-form .form-icon{
        width: 70px;
        height: 70px;
        font-size: 30px;
        line-height: 70px;
    }
}
</style>
<body>
    <div class="registration-form">
        <form method="POST" action="/login/auth" >
          @csrf
            <div>
                <img class="form-icon" src="{{$settings->barangay_logo ? asset ('storage/' .$settings->barangay_logo) : asset('/storage/no/-image.png')}}" style="width: 120px; padding:auto;">
            </div>

          <div class="form-group">
              <input type="text" class="form-control item" name="email" id="email" placeholder="Email">
              @Error('email')
              <p class="text-danger text-md mt-1">{{$message}}</p>
             @enderror
          </div>
            <div class="form-group">
                <input type="password" class="form-control item" name="password" id="password" placeholder="Password">
                @Error('password')
                <p class="text-danger text-md mt-1">{{$message}}</p>
               @enderror
              </div>
            <div class="form-group">
              <button type="submit" class="btn btn-block create-account">Login</button>
          </div>
          <p class="mt-2 mb-3" style="color: white">Don't have an account? <a href="/register" style="text-decoration:none">Register</p></a>
           <a href="/" class="float-right" style="text-decoration:none"><i class="fas fa-arrow-circle-left "> </i> Back</p></a>
        </form>

    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>
