@extends('welcome')
@section("sidebar")
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<!-- iCheck -->
<link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<!-- JQVMap -->
<link rel="stylesheet" href="{{asset('assets/plugins/jqvmap/jqvmap.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
<!-- summernote -->
<link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.min.css')}}">
<div class="min-height-300 bg-primary position-absolute w-100">
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 ps" id="sidenav-main">
        <div class="sidenav-header">
          <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-xl-none" aria-hidden="true" id="iconSidenav"></i>
          <a class="navbar-brand m-0">
            <img src="../assets/img/logo.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Metqa</span>
          </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse w-auto ps ps--active-y" id="sidenav-collapse-main">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link " href="{{route('home')}}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('clientfournisseur')}}">
                  <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                  </div>
                  <span class="nav-link-text ms-1">Partenaire</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="{{route('commande')}}">
                  <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-cart text-info text-sm opacity-10"></i>
                  </div>
                  <span class="nav-link-text ms-1">Commande</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="/contact">
                  <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-email-83 text-danger text-sm opacity-10"></i>
                  </div>
                  <span class="nav-link-text ms-1">Contact</span>
                </a>
              </li>
          </ul>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 362px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 270px;"></div></div></div>

      <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></aside>
  </div>
@endsection
@section('content')


    <div class="container card" style="margin: 80px;
    margin-left: 310px;
    width: 400%;">



                  <div class="container-fluid bg-3 text-center">
                    <h3>Contacter Nous </h3><br>
                    <div class="row">

                      <div class="col-sm-3">
                        <img src="https://tse4.mm.bing.net/th?id=OIP.Fylo6h3Wm6QFFPjS-14AZwHaHa&pid=Api&P=0&w=165&h=165" class="img-responsive" style="width:100%" alt="Image">
                        <p style="margin-top:20%">PO BOX 45731, Al - Azizia Street, Doha - Qatar</p>
                    </div>
                      <div style="margin-left:10%;width:10%" class="col-sm-3">

                        <img src="https://tse4.mm.bing.net/th?id=OIP.cWhGDCN18lPntwRPEWMYVgHaHW&pid=Api&P=0&w=159&h=157" class="img-responsive" style="width:100%" alt="Image">
                        <p style="margin-top:15%">+974 4431 5335</p>
                        <p >+974 4451 2859</p>
                    </div>
                      <div style="margin-left:10%;width:10%" class="col-sm-3">

                        <img src="https://tse4.mm.bing.net/th?id=OIP.ZZqfHDafHP16yX8Zp5Gt8AHaHa&pid=Api&P=0&w=153&h=153" class="img-responsive" style="width:100%" alt="Image">
                        <p style="margin-top:15%">info@metqa.com</p>
                        <p >admin@metqa.com</p>
                    </div>
                    </div>
                  </div><br>




</div>
@endsection
