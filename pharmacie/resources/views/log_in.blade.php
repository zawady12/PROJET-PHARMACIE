<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Login</title>

  <style>
    .bg-img-hero {
      height: 100%;
      background-size: cover;
      background-repeat: no-repeat;
      background-position: top center;
      background-image: url(https://pharmacyv5.bdtask.com/pharmacare-9.4_demo/assets/dist/img/logo/1613648935_68bf9146306b48c155ed.jpg);
    }
  </style>
</head>
<br>
<br>
<br>

<body class="bg-white body-bg">
  <main class="register-content">
    <div class="bg-img-hero position-fixed top-0 right-0 left-0 ">
      <!-- SVG Bottom Shape -->

      <!-- End SVG Bottom Shape -->
    </div>

    <!-- Content -->
    <div class="container py-5 py-sm-7">
      <a class="d-flex justify-content-center mb-5 pharmacare-logo" href="javascript:void(0)">
      </a>
      <div class="row justify-content-center">
        <div class="col-md-7 col-lg-5">
          <!-- Card -->
          <div class="form-card mb-5">
            <div class="form-card_body">
              <!-- Form -->
              <form action="{{route('postlog_in')}}" method="POST">
                <div class="mb-5">
                  @csrf
                  <div class="card o-hidden border-0 shadow-lg my-1">
                    <div class="container" style="width: 80%; height:500px">
                      <br>
                      <center>
                        <h4>CONNEXION</h4>
                      </center>
                      <br>
                      <br>

                      <div class="mb-3">
                        <label for="email" class="form-label" class="fst-italic">Email</label>
                        <input type="text" class="form-control" name="email" rows="3">
                        <span class="text-danger">@error('email'){{$message}}@enderror</span>
                      </div>
                      <br>

                      <div class="mb-3">
                        <label for="pass" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" name="pass" rows="3">
                        <span class="text-danger">@error('pass'){{$message}}@enderror</span>
                      </div>
                      <div class="row">
                        <div class="col-xs-8 p-t-5">
                          <input type="checkbox" name="remember" id="remember_me" class="filled-in chk-col-pink">
                          <label for="remember_me">{{ __('Remember me') }}</label>

                        </div>
                        <br>
                        <br>
                        <center>
                          <div class="d-grid gap-2">
                            <button class="btn btn-success">se connecter</button>
                          </div>
                          @if(session('success'))
                          <div class="alert alert-light">
                            {{ session('success') }}
                          </div>
                          @endif
                          @if(session('fail'))
                          <div class="alert alert-light">
                            {{ session('fail') }}
                          </div>
                          @endif
                        </center>
                      </div>
                    </div>
              </form>
</body>

</html>