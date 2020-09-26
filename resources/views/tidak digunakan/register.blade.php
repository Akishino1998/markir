<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>REGISTER | MARKIR</title>
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="styles/shards-dashboards.1.1.0.min.css">
    <link rel="stylesheet" href="styles/extras.1.1.0.min.css">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </head>
  <style>
    #image-preview{
      display:none;
    }
    #image-preview2{
      display:none;
    }
    .auth-form{
      max-width: 450px;
    }
  </style>
  <body class="h-100">
    <div class="container-fluid h-100">
      <div class="row h-100">
        <main class="main-content col">
            <div class="main-content-container container-fluid px-4 h-100" wfd-id="3">
              <div class="row no-gutters h-100" wfd-id="4">
                <div class="col-lg-5 col-md-8 auth-form mx-auto my-auto">
                  <div class="card">
                    <div class="card-body" wfd-id="14">
                      <img class="auth-form__logo d-table mx-auto mb-3" src="images/shards-dashboards-logo.svg" alt="Shards Dashboards - Register Template">
                      <h5 class="auth-form__title text-center mb-4">Daftar Juru Parkir</h5>
                      <form action="/daftar" method="POST" enctype="multipart/form-data" id="formRegister">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <div class="form-group" wfd-id="23">
                          <label for="exampleInputEmail1" wfd-id="24">Username</label>
                          <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group" wfd-id="21">
                          <label for="exampleInputPassword1" wfd-id="22">Password</label>
                          <input type="password" class="form-control" id="password" name="password" onChange="onChange()" required>
                        
                        <div class="form-group" wfd-id="19">
                          <label for="exampleInputPassword2" wfd-id="20">Ulangi Password</label>
                          <input type="password" class="form-control" id="confirm_password" onChange="onChange()" name="confirm" required>
                          <span id='message'></span>
                        </div>
                        <div class="form-group" wfd-id="23">
                          <label for="exampleInputEmail1" wfd-id="24">Nama</label>
                          <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="form-group" wfd-id="23">
                          <label for="exampleInputEmail1" wfd-id="24">No. HP</label>
                          <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                        </div>
                        <div class="form-group" wfd-id="19">
                          <label for="exampleInputPassword2" wfd-id="20">Foto Anda</label>
                          <img id="image-preview" alt="image preview" style="width: 100%;height:auto;"/>
                          <br/>
                          <input type="file" id="image-source" onchange="previewImage();" name="foto" required/>
                        </div>
                        <div class="form-group" wfd-id="19">
                          <label for="exampleInputPassword2" wfd-id="20">Foto KTP Anda</label>
                          <img id="image-preview2" alt="image preview" style="width: 100%;height:auto;"/>
                          <br/>
                          <input type="file" id="image-source2" onchange="previewImage2();" name="foto_ktp" required/>
                        </div>
                        <div class="form-group mb-3 d-table mx-auto" wfd-id="16">
                          <div class="custom-control custom-checkbox mb-1" wfd-id="17">
                            <input type="checkbox" class="custom-control-input" id="customCheck2" required>
                            <label class="custom-control-label" for="customCheck2" wfd-id="18">Saya setuju dengan  <a href="#">syarat & ketentuan</a>.</label>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-pill btn-accent d-table mx-auto" wfd-id="97">Create Account</button>
                        @csrf 
                      </form>
                    </div>
                    <div class="auth-form__meta d-flex" wfd-id="6">
                      <p>Klik disini untuk <a href="/login"> Login</a></p>
                    </div>
                  </div>
                  
                </div>
              </div>
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
    <script src="scripts/extras.1.1.0.min.js"></script>
    <script src="scripts/shards-dashboards.1.1.0.min.js"></script>
    <script src="scripts/app/app-blog-overview.1.1.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
  </body>
</html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
function previewImage() {
    document.getElementById("image-preview").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("image-source").files[0]);
 
    oFReader.onload = function(oFREvent) {
      document.getElementById("image-preview").src = oFREvent.target.result;
    };
  };
  function previewImage2() {
    document.getElementById("image-preview2").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("image-source2").files[0]);
 
    oFReader.onload = function(oFREvent) {
      document.getElementById("image-preview2").src = oFREvent.target.result;
    };
  };
  function onChange() {
    const password = document.querySelector('input[name=password]');
    const confirm = document.querySelector('input[name=confirm]');
    if (confirm.value === password.value) {
      confirm.setCustomValidity('');
    } else {
      confirm.setCustomValidity('Passwords do not match');
    }
  }

  $('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
  });

  document.querySelector('#formRegister').addEventListener('submit', function(e) {
        var form = this;
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/checkUsernameUser',
            method: 'post',
            data: $('#formRegister').serialize(), // prefer use serialize method
            success:function(data){
              console.log(data);
                if(data > 0){
                  swal({
                        title: "Username Sudah Terdaftar!",
                        text: "Username lain, ya!",
                        icon: "warning",
                        buttons: "danger"
                        // dangerMode: true,
                    });
                }else{
                  $( "#formRegister" ).submit();
                }
            }
        });
        
    });
</script>