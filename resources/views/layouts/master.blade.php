<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
@if ( !session()->has('username') )
<script>window.location = "/login";</script>
@endif
<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Markir</title>
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="{{ asset('styles/shards-dashboards.1.1.0.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/extras.1.1.0.min.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </head>

  <body class="h-100">
    
  <div class="container-fluid">
      <div class="row">
        <main class="main-content col-lg-12 col-md-12 col-sm-12 p-0">
          <div class="main-navbar  bg-white">
            <div class="container p-0">
              <!-- Main Navbar -->
              <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
                <a class="navbar-brand" href="#" style="line-height: 25px;">
                  <div class="d-table m-auto">
                    <img id="main-logo" class="d-inline-block align-top mr-1 ml-3" style="max-width: 25px;" src="{{ asset('images/shards-dashboards-logo.svg') }}" alt="Shards Dashboard">
                    <span class="d-none d-md-inline ml-1">Markir</span>
                  </div>
                </a>
                <ul class="navbar-nav border-left flex-row border-right ml-auto">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                      <img class="user-avatar rounded-circle mr-2" src="{{ asset('foto-user-jukir/') }}/{{ Session::get('foto') }}" alt="User Avatar" height="40" width="40"> <span class="d-none d-md-inline-block">{{ Session::get('nama') }} ({{ Session::get('username') }}) </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-small">
                      <a class="dropdown-item" href="/biodata"><i class="material-icons"></i> Profile</a>
                      <a class="dropdown-item" href="/edit-biodata"><i class="material-icons"></i> Edit Profile</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-danger" href="/logout">
                        <i class="material-icons text-danger"></i> Logout </a>
                    </div>
                  </li>
                </ul>
                <nav class="nav">
                  <a href="#" class="nav-link nav-link-icon toggle-sidebar  d-inline d-lg-none text-center " data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                    <i class="material-icons"></i>
                  </a>
                </nav>
              </nav>
            </div> <!-- / .container -->
          </div> <!-- / .main-navbar -->
          <div class="header-navbar collapse d-lg-flex p-0 bg-white border-top">
            <div class="container">
              <div class="row">
                <div class="col">
                  <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                    <li class="nav-item ">
                      <a href="/dasboard" class="nav-link {{ (request()->is('dasboard')) ? 'active' : '' }}" ><i class="material-icons"></i> Dashboards</a>
                    </li>
                    <li class="nav-item ">
                      <a href="/parkir-terkini" class="nav-link {{ (request()->is('parkir-terkini')) ? 'active' : '' }}"><i class="fa fa-product-hunt" aria-hidden="true"></i> Parkir Terkini</a>
                    </li>
                    <li class="nav-item ">
                      <a href="/riwayat" class="nav-link {{ (request()->is('riwayat')) ? 'active' : '' }}"><i class="fa fa-file-text-o" aria-hidden="true"></i> Riwayat Parkir</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        @yield('content')
        <footer class="main-footer d-flex p-2 px-3 bg-white border-top" id="footer">

          <span class="copyright ml-auto my-auto mr-2">Made With <i class="fa fa-heart" aria-hidden="true" style="color:red;"></i> by
              <a href="https://facebook.com/EkoPujianto1998">akishino</a>
          </footer>
        </main>
      </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="{{ asset('scripts/extras.1.1.0.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('scripts/shards-dashboards.1.1.0.min.js') }}"></script>
    <script src="{{ asset('scripts/app/app-blog-overview.1.1.0.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://designrevision.com/demo/shards-dashboards/scripts/app/app-analytics-overview.1.3.1.min.js"></script>
  </body>
</html>

@yield('js')