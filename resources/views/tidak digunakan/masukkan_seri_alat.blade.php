<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="{{ asset('styles/shards-dashboards.1.1.0.min.css') }}">
    <link rel="stylesheet" href="{{ asset("styles/extras.1.1.0.min.css") }}">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </head>
  <body class="h-100">
    <div class="container-fluid h-100">
      <div class="row h-100">
        <main class="main-content col">
            {{-- <div class="main-content-container container-fluid h-100"> --}}
                <div class="row no-gutters h-100">
                    <div class="col-lg-3 col-md-5 auth-form mx-auto my-auto">
                        <div class="card">
                            <div class="card-body">
                                {{-- <img class="auth-form__logo d-table mx-auto mb-3" src="images/shards-dashboards-logo.svg" alt="Shards Dashboards - Register Template"> --}}
                                <h5 class="auth-form__title text-center mb-4">Masukkan No. Seri Alatmu</h5>
                                <form action="/masukkan-seri-alat/{{ $user->id }}" method="POST">
                                    <div class="form-group">
                                        <label for="username">No. Seri Alat</label>
                                        <input type="text" class="form-control" id="no_seri_alat" placeholder="No. Seri" name="no_seri_alat" required>
                                    </div>
                                    <button type="submit" class="btn btn-pill btn-accent d-table mx-auto">Masukkan No. Seri</button>
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
      </div>
    </div>
  </body>
</html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(Session::has('alert')){
    @if(Session::get('alert')==1){
        <script>
            swal({
                title : "Langkah Terakhir, masukkan Kode Alat Anda!",
                icon : "success",
                button : "Ok!",
            });	
        </script>
    }
    @endif
@endif