<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Cv Builder</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
   <!-- style css -->
   <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
   <!-- Responsive-->
   <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
   <!-- fevicon -->
   <link rel="icon" href="{{asset('frontend/images/fevicon.png')}}" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="{{asset('frontend/css/jquery.mCustomScrollbar.min.css')}}">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
      media="screen">
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
   <!-- loader  -->
   <div class="loader_bg">
      <div class="loader"><img src="{{asset('frontend/images/loading.gif')}}" alt="#" /></div>
   </div>
   <!-- end loader -->
   <!-- header -->
   <header>
      <!-- header inner -->
      <div class="head_top">
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.html"><img src="{{asset('frontend/images/logo.png')}}" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                           data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                           aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item">
                                 <a class="nav-link" href="#"> Home </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#">About</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#">Contact</a>
                              </li>
                              @if(Auth::check())
                              <li class="nav-item">
                                <a class="nav-link" href="{{route('home')}}">Cv-Panel</a>
                             </li>
                              <li class="nav-item">
                                <a class="nav-link" href="{{route('user.logout')}}">Logout</a>
                             </li>
                             @elseif(!Auth::check())
                             <li class="nav-item">
                                <a class="nav-link" href="{{route('login')}}">Login</a>
                             </li>
                             <li class="nav-item mr-5">
                                <a class="nav-link" href="{{route('register')}}">Register</a>
                             </li>
                             @endif
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
         <!-- end header inner -->
         <!-- end header -->
         <!-- banner -->
         <section class="banner_main">
            <div class="container-fluid">
               <div class="row d_flex">
                  <div class="col-md-6">
                     <div class="text-bg">
                        <h1>Create your Cv</h1>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                           page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                           normal distribution of letters,</p>
                        @if(Auth::check())
                        <a href="{{route('userCv')}}">Start Now</a>
                        @else
                        <a href="{{route('login')}}">Start Now</a>
                        @endif
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="text-img">
                        <figure><img src="{{asset('frontend/images/side.png')}}" alt="#" /></figure>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
   </header>