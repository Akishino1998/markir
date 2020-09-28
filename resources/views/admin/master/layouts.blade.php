<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
@if ( !session()->has('username-admin') )
<script>window.location = "/admin/login";</script>
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
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="{{ asset('css/shards-dashboards.1.1.0.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/extras.1.1.0.min.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </head>

  <body class="h-100">
      <div class="container-fluid icon-sidebar-nav">
        <div class="row">
          <!-- Main Sidebar -->
          <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
            <div class="main-navbar">
              <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
                <a class="navbar-brand w-100 mr-0" href="/admin/home" style="line-height: 25px;">
                  <div class="d-table m-auto">
                    <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="{{ asset('images/logo/markir.PNG') }}" alt="Shards Dashboard">
                  </div>
                </a>
                <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                  <i class="material-icons">&#xE5C4;</i>
                </a>
              </nav>
            </div>
            <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
              <div class="input-group input-group-seamless ml-3">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-search"></i>
                  </div>
                </div>
                <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search">
              </div>
            </form>
            <div class="nav-wrapper">
              <h6 class="main-sidebar__nav-title">Dashboards</h6>
              <ul class="nav nav--no-borders flex-column">
                <li class="nav-item">
                  <a class="nav-link " href="/admin/home">
                    <i class="material-icons">home</i>
                    <span>Beranda</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="/admin/parkirmasuk">
                    <i class="material-icons">moped</i>
                    <span>Parkir Terkini</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="/admin/parkirkeluar">
                    <i class="material-icons">history</i>
                    <span>Riwayat Parkir</span>
                  </a>
                </li>
              </ul>
              <h6 class="main-sidebar__nav-title">Templates</h6>
              <ul class="nav nav--no-borders flex-column">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                    <i class="material-icons">&#xE7FD;</i>
                    <span>Master Data</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item " href="/admin/userbiodata">Data User</a>
                    <a class="dropdown-item " href="/admin/jukir">Data Juru Parkir</a>
                    <a class="dropdown-item " href="/admin/admin">Data Admin</a>
                    <a class="dropdown-item " href="/admin/info">Merk Kendaraan</a>
                    <a class="dropdown-item " href="/admin/refbiaya">Biaya Kendaraan</a>
                    
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="material-icons">&#xE2C7;</i>
                    <span>Laporan</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item " href="/admin/laporan ">Laporan Parkir</a>
                  </div>
                </li>
              </ul>
            </div>
          </aside>
          <!-- End Main Sidebar -->
          
  {{-- <div class="container-fluid"> --}}
    <main class="main-content col">
      <div class="main-navbar sticky-top bg-white">
          <div class="main-navbar  bg-white">
            <div class="container p-0">
              <!-- Main Navbar -->
              <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
               
                <ul class="navbar-nav border-left flex-row border-right ml-auto">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                      <span>Hi admin</span>
                      <img class="user-avatar rounded-circle mr-2" src="{{ asset('images/avatars/profil.jpeg') }}" alt="User Avatar"> <span class="d-none d-md-inline-block">{{ Session::get('nama') }}</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-small">
                      <a class="dropdown-item" href="/biodata"><i class="material-icons">account_circle</i> Profile</a>
                      <a class="dropdown-item" href="/edit-biodata"><i class="material-icons">edit</i> Edit Profile</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-danger" href="/admin/login">
                        <i class="material-icons text-danger"></i> Logout </a>   
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
        <!-- / .main-navbar -->
            <div class="header-navbar collapse d-lg-flex p-0 bg-white border-top"> 
            
              <div class="container">
                <div class="row">
                  <div class="col">
                  </div>
                </div>
              </div>
            </div>
                @yield("content")
                <footer class="main-footer d-flex p-2 px-5x bg-white border-top" id="footer">

                  <span class="copyright ml-auto my-auto mr-2">Made With <i class="fa fa-heart" aria-hidden="true" style="color:rgb(0, 162, 255);"></i> by
                      <a href="https://facebook.com/EkoPujianto1998">Nyervisga</a>
                  </footer>
          </div>
        </main>
        
      </div>
    </div>
  
      
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="{{asset ('js/scripts/extras.1.1.0.min.js') }}"></script>
    <script src="{{asset ('js/scripts/shards-dashboards.1.1.0.min.js') }}"></script>
    <script src="{{asset ('js/scripts/shards-dashboards.1.1.0.js') }}"></script>
    {{-- <script src="{{asset ('js/scripts/app/app-analytics-overview.1.1.0.min.js') }}"></script> --}}
  </body>
</html>
@yield('js')