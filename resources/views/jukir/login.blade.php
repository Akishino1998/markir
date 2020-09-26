
<!DOCTYPE html>
<html lang="en" >
    <head>
        <base href="../../../../">
        <meta charset="utf-8"/>
        <title>Metronic | Login Page 3</title>
        <meta name="description" content="Login page example"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>        <!--end::Fonts-->
        <link href="{{ asset('dist/assets/css/pages/login/classic/login-3.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('dist/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('dist/assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('dist/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="{{ asset('dist/assets/media/logos/favicon.ico') }}"/>

    </head>
    <body  id="kt_body"  class="header-fixed header-mobile-fixed subheader-enabled sidebar-enabled page-loading"  >
	    <div class="d-flex flex-column flex-root">
            <div class="login login-3 login-signin-on d-flex flex-row-fluid" id="kt_login">
                <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url({{ asset('dist/assets/media/bg/bg-1.jpg') }});">
                    <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
                        <div class="d-flex flex-center mb-15">
                            <a href="#">
                                <img src="{{ asset('dist/assets/media/logos/logo-letter-9.png') }}" class="max-h-100px" alt=""/>
                            </a>
                        </div>
                        <!--end::Login Header-->

                        <!--begin::Login Sign in form-->
                        <div class="login-signin">
                            <div class="mb-20">
                                <h3>Juru Parkir</h3>
                            </div>
                            <form action="/jukir/login" class="form" id="kt_login_signin_form" method="POST">
                                <div class="form-group">
                                    <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" type="text" placeholder="Username" name="username" autocomplete="off"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" type="password" placeholder="Password" name="password"/>
                                </div>
                                
                                <div class="form-group text-center mt-10">
                                    <button id="kt_login_signin_submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3">Masuk</button>
                                </div>
                                @csrf
                            </form>
                            <div class="mt-10">
                                <span class="opacity-70 mr-4">
                                    Belum Punya Akun?
                                </span>
                                <a href="javascript:;" id="kt_login_signup" class="text-white font-weight-bold">Daftar</a>
                            </div>
                        </div>
                        <!--end::Login Sign in form-->

                        <!--begin::Login Sign up form-->
                        <div class="login-signup">
                            <div class="mb-20">
                                <h3>Daftar Juru Parkir</h3>
                            </div>
                            <form action="/jukir/daftar" class="form text-center" id="kt_login_signup_form" method="POST"  enctype="multipart/form-data">
                                <div class="form-group ">
                                    <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="Nama" name="nama"/>
                                </div>
                                <div class="form-group ">
                                    <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="number" placeholder="No. HP" name="no_hp"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" id="username" placeholder="Username" name="username" autocomplete="off"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="password" placeholder="Password" name="password"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="password" placeholder="Confirm Password" name="cpassword"/>
                                </div>
                                <div class="form-group">
                                    <h6>Foto </h6>
                                    <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="file" placeholder="foto" name="foto"/>
                                </div>
                                <div class="form-group">
                                    <h6>Foto KTP </h6>
                                    <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="file" placeholder="foto_ktp" name="foto_ktp"/>
                                </div>
                                <div class="form-group text-left px-8">
                                    <div class="checkbox-inline">
                                        <label class="checkbox checkbox-outline checkbox-white text-white m-0">
                                            <input type="checkbox" name="agree"/>
                                            <span></span>
                                            I Agree the <div href="#" class="text-white font-weight-bold ml-1">terms and conditions</div>.
                                        </label>
                                    </div>
                                    <div class="form-text text-muted text-center"></div>
                                </div>
                                <div class="form-group">
                                    <button id="kt_login_signup_submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 m-2">Sign Up</button>
                                    <button id="kt_login_signup_cancel" class="btn btn-pill btn-outline-white font-weight-bold opacity-70 px-15 py-3 m-2">Cancel</button>
                                </div>
                                @csrf
                            </form>
                        </div>
                        <!--end::Login Sign up form-->

                        <!--begin::Login forgot password form-->
                        <div class="login-forgot">
                            <div class="mb-20">
                                <h3>Forgotten Password ?</h3>
                                <p class="opacity-60">Enter your email to reset your password</p>
                            </div>
                            <form class="form" id="kt_login_forgot_form">
                                <div class="form-group mb-10">
                                    <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off"/>
                                </div>
                                <div class="form-group">
                                    <button id="kt_login_forgot_submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 m-2">Request</button>
                                    <button id="kt_login_forgot_cancel" class="btn btn-pill btn-outline-white font-weight-bold opacity-70 px-15 py-3 m-2">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
	    </div>
        <script src="{{ asset('dist/assets/plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ asset('dist/assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
        <script src="{{ asset('dist/assets/js/scripts.bundle.js') }}"></script>
        <script src="{{ asset('dist/assets/js/pages/custom/login/login-general.js') }}"></script>
    </body>
</html>
@if(Session::has('alert'))
    @if(Session::get('alert')==2)
        <script>
            swal.fire({
                title : "Password Salah!",
                icon : "warning",
                button : "Ok!",
            });	
        </script>
    
    @elseif(Session::get('alert')==3)
      <script>
          swal.fire({
              title : "Tidak Terdaftar!",
              icon : "warning",
              button : "Ok!",
          });	
      </script>
    
    @elseif(Session::get('alert')==4)
      <script>
          swal.fire({
              title : "Akun Anda Belum Diverifikasi!",
              icon : "info",
              button : "Ok!",
          });	
      </script>
    
    @elseif(Session::get('alert')==5)
      <script>
          swal.fire({
              title : "Akun Anda Di Non-Aktifkan!",
              icon : "error",
              button : "Ok!",
          });	
      </script>
    
    @elseif(Session::get('alert')==6)
      <script>
          swal.fire({
              title : "Akun Anda Tidak Disetujui!",
              icon : "error",
              button : "Ok!",
          });	
      </script>
    
    @elseif(Session::get('alert')==7)
      <script>
          swal.fire({
              title : "Silahkan Tunggu Sampai Akun Anda Diproses Verifikasi!",
              icon : "success",
              button : "Ok!",
          });	
      </script>
    
    @endif
  
  @endif
  