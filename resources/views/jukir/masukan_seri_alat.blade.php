<!DOCTYPE html>
<html lang="en" >
    <head>
		<base href="../../../../">
        <meta charset="utf-8"/>
        <title>Metronic | Login Page 4</title>
        <meta name="description" content="Login page example"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>        <!--end::Fonts-->
        <link href="{{ asset('dist/assets/css/pages/login/classic/login-4.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('dist/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('dist/assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('dist/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}"/>
    </head>
    <body  id="kt_body"  class="header-fixed header-mobile-fixed subheader-enabled sidebar-enabled page-loading"  >
		<div class="d-flex flex-column flex-root">
			<div class="login login-4 d-flex flex-row-fluid login-forgot-on" id="kt_login">
				<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('assets/media/bg/bg-3.jpg');">
					<div class="login-form text-center p-7 position-relative overflow-hidden">
						<div class="d-flex flex-center mb-15">
							<a href="#">
								<img src="{{ asset('dist/assets/media/logos/logo-letter-13.png') }}" class="max-h-75px" alt=""/>
							</a>
						</div>
						<div class="login-forgot">
							<div class="mb-20">
								<h3>Masukkan Nomor Alatmu!</h3>
								<div class="text-muted font-weight-bold">Langkah Terakhir, mengaitkan akun kamu dengan alat yang telah diberikan!</div>
							</div>
							<form class="form" id="kt_login_forgot_form" action="/jukir/masukkan-seri-alat/{{ $user->id }}" method="POST">
								<div class="form-group mb-10">
									<input class="form-control form-control-solid h-auto py-4 px-8" type="number" placeholder="No. Alat" name="no_seri_alat" autocomplete="off" required/>
								</div>
								<div class="form-group d-flex flex-wrap flex-center mt-10">
									<button id="kt_login_forgot_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Submit</button>
                                </div>
                                @csrf
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="{{ asset('dist/assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('dist/assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/pages/custom/login/login-general.js') }}"></script>
	</body>
</html>