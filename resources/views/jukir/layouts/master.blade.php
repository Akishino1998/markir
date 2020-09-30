<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
@if ( !session()->has('username-jukir') )
<script>window.location = "/jukir/login";</script>
@endif
<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 9 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" >
    <!--begin::Head-->
    <head>
        <base href="">
        <meta charset="utf-8"/>
        <title>Markir | Aplikasi Juru Parkir</title>
        <meta name="description" content="Updates and statistics"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>        <!--end::Fonts-->
        <link href="{{ asset('dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css"/>

        <link href="{{ asset('dist/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('dist/assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('dist/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
        
        <link rel="shortcut icon" href="{{ asset('dist/assets/media/logos/favicon.ico') }}"/>

    </head>
    <body  id="kt_body"  class="header-fixed header-mobile-fixed sidebar-enabled page-loading"  >
        <div id="kt_header_mobile" class="header-mobile  header-mobile-fixed " >
            <a href="index.html">
                <img alt="Logo" src="{{ asset('dist/assets/media/logos/logo-letter-1.png') }}" class="logo-default max-h-30px"/>
            </a>
            <div class="d-flex align-items-center">
                <button class="btn p-0 burger-icon burger-icon-left rounded-0" id="kt_header_mobile_toggle">
                    <span></span>
                </button>
                <button class="btn btn-hover-icon-primary p-0 ml-2" id="kt_aside_mobile_toggle">
                    <span class="svg-icon svg-icon-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"/>
                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                            </g>
                        </svg>
                    </span>			
                </button>
            </div>
        </div>

	    <div class="d-flex flex-column flex-root">
		    <div class="d-flex flex-row flex-column-fluid page">
                <div class="aside aside-left d-flex flex-column " id="kt_aside">
                    <div class="aside-brand d-flex flex-column align-items-center flex-column-auto py-9">
                        <!--begin::Logo-->
                        <div class="btn p-0 symbol symbol-40 symbol-success" href="?page=index" id="kt_quick_user_toggle">
                            <div class="symbol-label ">
                                <img alt="Logo" src="{{ asset('dist/assets/media/svg/avatars/007-boy-2.svg') }}" class="h-75 align-self-end">
                            </div>
                        </div>
                        <!--end::Logo-->
                    </div>
                    
                </div>

                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                    <div id="kt_header" class="header  header-fixed " >
                        <div class="header-wrapper rounded-top-xl d-flex flex-grow-1 align-items-center">
                            <div class=" container-fluid  d-flex align-items-center justify-content-end justify-content-lg-between flex-wrap">
                                <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                                    <div id="kt_header_menu" class="header-menu header-menu-mobile  header-menu-layout-default ">
                                        <ul class="menu-nav ">
                                            <li class="menu-item  {{ (request()->is('jukir')) ? 'menu-item-here' : '' }}">   
                                                <a href="/jukir" class="menu-link ">
                                                    <span class="menu-text">Dashboard</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                            </li>
                                            <li class="menu-item  {{ (request()->is('jukir/parkir-terkini')) ? 'menu-item-here' : '' }}">   
                                                <a href="/jukir/parkir-terkini" class="menu-link ">
                                                    <span class="menu-text">Parkir Terkini</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                            </li>
                                            <li class="menu-item  {{ (request()->is('jukir/riwayat-parkir')) ? 'menu-item-here' : '' }}">   
                                                <a href="/jukir/riwayat-parkir" class="menu-link ">
                                                    <span class="menu-text">Riwayar Parkir</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                            </li>			
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
                        <div class="d-flex flex-column-fluid">
                            <div class=" container-fluid ">
                                @yield('konten') 
                            </div>
                        </div>
                    </div>
                
                    <div class="footer py-2 py-lg-0 my-5 d-flex flex-lg-column " id="kt_footer">
                        <div class=" container-fluid  d-flex flex-column flex-md-row align-items-center justify-content-between">
                            <div class="text-dark order-2 order-md-1">
                                <span class="text-muted font-weight-bold mr-2">2020&copy;</span>
                                <a href="http://keenthemes.com/metronic" target="_blank" class="text-dark-75 text-hover-primary">Nyervisga</a>
                            </div>
                            <div class="nav nav-dark order-1 order-md-2">
                                <a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pr-3 pl-0"></a>
                                <a href="http://keenthemes.com/metronic" target="_blank" class="nav-link px-3"></a>
                                <a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-3 pr-0"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar sidebar-left d-flex flex-row-auto flex-column " id="kt_sidebar">
                    @yield('sideBar')
                </div>
	        </div>
        </div>


        {{-- USER DETAIL --}}
        <div id="kt_quick_user" class="offcanvas offcanvas-left p-10">
            <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5" kt-hidden-height="40" style="">
                <h3 class="font-weight-bold m-0">
                    Profile Juru Parkir
                </h3>
                <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
                    <i class="ki ki-close icon-xs text-muted"></i>
                </a>
            </div>
            <div class="offcanvas-content pr-5 mr-n5 scroll ps" style="height: 289px; overflow: hidden;">
                <div class="d-flex align-items-center mt-5">
                    <div class="symbol symbol-100 mr-5">
                        <div class="symbol-label" style="background-image:url('{{ asset('foto-user-jukir/') }}/{{ Session::get('foto-jukir') }}')"></div>
                        <i class="symbol-badge bg-success"></i>
                    </div>
                    <div class="d-flex flex-column">
                        <div class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
                            {{ Session::get('nama-jukir') }} ({{ Session::get('username-jukir') }}) 
                        </div>
                        <div class="text-muted mt-1">
                            Juru Parkir
                        </div>
                        <div class="navi mt-2">
                            <div class="navi-item">
                                <span class="navi-link p-0 pb-2">
                                    <span class="navi-icon mr-1">
                                        <span class="svg-icon svg-icon-lg svg-icon-primary">
                                            <i class="fas fa-phone"></i>
                                        </span>							
                                    </span>
                                    <span class="navi-text text-muted text-hover-primary">{{ Session::get('no_hp-jukir') }}</span>
                                </span>
                            </div>
                            <a href="/jukir/logout" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Keluar</a>
                        </div>
                    </div>
                </div>
                <div class="separator separator-dashed mt-8 mb-5"></div>
                <div class="navi navi-spacer-x-0 p-0">
                    <a href="/jukir/profile" class="navi-item">
                        <div class="navi-link">
                            <div class="symbol symbol-40 bg-light mr-3">
                                <div class="symbol-label">
                                    <span class="svg-icon svg-icon-md svg-icon-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000"></path>
                                                <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5"></circle>
                                            </g>
                                        </svg>
                                    </span>						
                                </div>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold">
                                    Profileku
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 289px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
        </div>
        <script>
            var KTAppSettings = {
    "breakpoints": {
        "sm": 576,
        "md": 768,
        "lg": 992,
        "xl": 1200,
        "xxl": 1200
    },
    "colors": {
        "theme": {
            "base": {
                "white": "#ffffff",
                "primary": "#663259",
                "secondary": "#E5EAEE",
                "success": "#1BC5BD",
                "info": "#8950FC",
                "warning": "#FFA800",
                "danger": "#F64E60",
                "light": "#F3F6F9",
                "dark": "#212121"
            },
            "light": {
                "white": "#ffffff",
                "primary": "#F4E1F0",
                "secondary": "#ECF0F3",
                "success": "#C9F7F5",
                "info": "#EEE5FF",
                "warning": "#FFF4DE",
                "danger": "#FFE2E5",
                "light": "#F3F6F9",
                "dark": "#D6D6E0"
            },
            "inverse": {
                "white": "#ffffff",
                "primary": "#ffffff",
                "secondary": "#212121",
                "success": "#ffffff",
                "info": "#ffffff",
                "warning": "#ffffff",
                "danger": "#ffffff",
                "light": "#464E5F",
                "dark": "#ffffff"
            }
        },
        "gray": {
            "gray-100": "#F3F6F9",
            "gray-200": "#ECF0F3",
            "gray-300": "#E5EAEE",
            "gray-400": "#D6D6E0",
            "gray-500": "#B5B5C3",
            "gray-600": "#80808F",
            "gray-700": "#464E5F",
            "gray-800": "#1B283F",
            "gray-900": "#212121"
        }
    },
    "font-family": "Poppins"
};
        </script>
    	<script src="{{ asset('dist/assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('dist/assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
		<script src="{{ asset('dist/assets/js/scripts.bundle.js') }}"></script>

    </body>

    
    @yield('js')
</html>
