<?php use \App\Http\Controllers\GeneralController; ?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Envetra - Delivering Health</title>
<!-- <meta name="keywords" content="" /> -->
<!-- <meta name="description" content=""> -->
<!-- <meta name="author" content=""> -->

<!-- Mobile view -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Favicon -->
<link rel="shortcut icon" href="{{asset('images/favicon.png')}}">
<link rel="stylesheet" type="text/css" href="{{asset('js/bootstrap/bootstrap.min.css')}}">

<!-- Google fonts  -->
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Yesteryear" rel="stylesheet">

<!-- Template's stylesheets -->
<link rel="stylesheet" href="{{asset('js/megamenu/stylesheets/screen.css')}}">
<link rel="stylesheet" href="{{asset('css/theme-default.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('js/loaders/stylesheets/screen.css')}}">
<link rel="stylesheet" href="{{asset('css/corporate.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('fonts/font-awesome/css/font-awesome.min.css')}}" type="text/css">
<!-- <link rel="stylesheet" type="text/css" href="assets/js/revolution-slider/css/settings.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="assets/js/revolution-slider/css/layers.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="assets/js/revolution-slider/css/navigation.css"> -->
<link rel="stylesheet" href="{{asset('js/parallax/main.css')}}">
<link href="{{asset('js/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
<link href="{{asset('js/owl-carousel/owl.theme.css')}}" rel="stylesheet">
<link href="{{asset('js/tabs/css/responsive-tabs.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('css/intlTelInput.min.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('css/col-5.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('css/custom.css')}}" rel="stylesheet">
<!-- Template's stylesheets END -->

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->


</head>

<body>

<div class="preloader"></div>

<!--end loading--> 
<div class="wrapper-boxed">
  <div class="site-wrapper">
    <div class="col-md-12 nopadding">
      <div class="header-section style1 pin-style">
        <div class="container">
          <div class="mod-menu">
            <div class="row">
              <div class="col-sm-3"> <a href="#home" title="" class="logo style-2 mar-4" style="width: auto;"> <img src="{{asset('images/new/logo.png')}}" alt="" style="width: 85%;"> </a> </div>
              <div class="col-sm-9">
                <div class="main-nav">
                  <ul class="nav navbar-nav top-nav">
                    <li class="visible-xs menu-icon"> <a href="javascript:void(0)" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false"> <i aria-hidden="true" class="fa fa-bars"></i> </a> </li>
                  </ul>
                  <div id="menu" class="collapse">
                    <ul class="nav navbar-nav">
                      <li class="right active"> <a href="#home">{{GeneralController::getTitle('home','title')}}</a></li>
                      <li> <a href="#about-us">{{GeneralController::getTitle('about','title')}}</a></li>
                      <li> <a href="#team">{{GeneralController::getTitle('the-team','title')}}</a></li>
                      <li> <a href="#services">{{GeneralController::getTitle('services','title')}}</a></li>
                      <li> <a href="#partners">{{GeneralController::getTitle('partners','title')}}</a></li>
                      <li> <a href="#testimonials">{{GeneralController::getTitle('testimonials','title')}}</a></li>
                      <li> <a href="#contact" class="contactus">{{GeneralController::getTitle('contact-us','title')}}</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--end menu--> 
      
    </div>
    <!--end menu-->
    
    <div class="clearfix"></div>
    
