<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <!-- Google Tag Manager -->
    <script>dataLayer = [{ 'ga-tracking-id' : 'UA-115105611-1' }];</script>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WGLBNC8');</script>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>LOGIN</title>
    <meta name="description" content="A premium collection of beautiful hand-crafted Bootstrap 4 admin dashboard templates and dozens of custom components built for data-driven applications.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.3.1" href="{{asset('styles/shards-dashboards.1.3.1.min.css')}}">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="{{asset('css/shards-dashboards.1.1.0.min.css') }}">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="{{asset('css/shards-dashboards.1.1.0.css') }}">
    <link rel="stylesheet" href="{{asset('styles/extras.1.3.1.min.css')}}">
    <script async defer src="https://buttons.github.io/buttons.js"></script>



  </head>
  <body class="h-100">
    <div class="container-fluid icon-sidebar-nav h-100">
      <div class="row h-100">
        <!-- End Main Sidebar -->
        <main class="main-content col">
          <div class="main-content-container container-fluid px-4 my-auto h-100">
            <div class="row no-gutters h-100">
              <div class="col-lg-3 col-md-5 auth-form mx-auto my-auto">
                <div class="card">
                  <div class="card-body">
                    <img class="auth-form__logo d-table mx-auto mb-3" src="images/logo/markir.PNG" alt="Shards Dashboards - Register Template">
                    <h2 class="auth-form__title text-center mb-4"> ADMIN MARKIR</h2>
                    <h6 class="text-center mb-4 mg-4">Silahkan input akun anda dengan benar</h6>
                    <form method="POST" action="/admin/login">
                      {{-- ini sangat mudah asuuuu  ITU DILEMPAR DULU DALAM LOGIN UNTK DI CEK, baru ke home hmm/ really ntar kukasih tutorlnya--}}
                        {{ csrf_field() }}
                      <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" id="username" name="username" placeholder="Username" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" id="password" name="password" placeholder="Password" required>
                      </div>
                      <div class="form-group mb-3 d-table mx-auto">
                        <div class="custom-control custom-checkbox mb-1">
                          <input type="checkbox" class="custom-control-input" id="customCheck2">
                        </div>
                      </div>
                      <button type="submit" class="btn btn-pill btn-accent d-table mx-auto" value="post">Masuk</button>
                    </form>
                  </div>
                </div>
                <div class="auth-form__meta d-flex mt-4">
                  <a href="forgot-password.html">Forgot your password?</a>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="{{asset('scripts/extras.1.3.1.min.js')}}"></script>
    <script src="{{asset('scripts/shards-dashboards.1.3.1.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.3.5/dist/sweetalert2.all.min.js"></script>
  </body>
</html>
@if (Session::has('alert'))
    @if (Session::get('alert') == 1)
        <script>
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Username atau password anda salah!'
          })
        </script>
    @endif
@endif