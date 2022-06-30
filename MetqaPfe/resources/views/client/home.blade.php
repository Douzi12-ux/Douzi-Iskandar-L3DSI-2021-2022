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
              <a class="nav-link active" href="{{route('home')}}">
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
                <a class="nav-link " href="/contact">
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


    <div class="container " style="margin: 80px;
    margin-left: 310px;
    width: 400%;">


<sup>
                <div class="jumbotron">
                    <div class="container text-center">
                        <img src="{{asset('assets/img/17.jpg')}}" class="img-responsive" style="width:100%;height:30%" alt="Image">
                    </div>
                  </div>
                </sup>
                  <div class="container-fluid bg-3 text-center">
                    <h3>Some of my Work</h3><br>
                    <div class="row">
                      <div class="col-sm-3">

                        <img src="{{asset('assets/img/16.jpg')}}" class="img-responsive" style="width:100%" alt="Image">
                        <p>À PROPOS DE NOUS
                            VOTRE PONT VERS L'EXCELLENCE
                            Milipol Equipment Trading "METQA" a été créé sur la base de Qatar Security Services, la principale vision nationale engagée dans la fourniture de systèmes et d'équipements innovants dans l'État du Qatar.

                            Pour répondre aux exigences de Qatar Vision & Deserves et des normes de qualité internationales, nous nous associons à des sociétés mondiales spécialisées dans des domaines spécifiques ; experts dans la fourniture, l'approvisionnement et la réparation d'équipements et de composants pour :

                        </p>
                      </div>
                      <div class="col-sm-3">
                        <p>Some text..</p>
                        <img src="{{asset('assets/img/17.jpg')}}" class="img-responsive" style="width:100%" alt="Image">
                      </div>
                      <div class="col-sm-3">
                        <p>Some text..</p>
                        <img src="{{asset('assets/img/17.jpg')}}" class="img-responsive" style="width:100%" alt="Image">
                      </div>
                      <div class="col-sm-3">
                        <p>Some text..</p>
                        <img src="{{asset('assets/img/17.jpg')}}" class="img-responsive" style="width:100%" alt="Image">
                      </div>
                    </div>
                  </div><br>

                  <div class="container-fluid bg-3 text-center">
                    <div class="row">
                      <div class="col-sm-3">
                        <p>Some text..</p>
                        <img  class="img-responsive" style="width:100%" alt="Image">
                      </div>
                      <div class="col-sm-3">
                        <p>Some text..</p>
                        <img  class="img-responsive" style="width:100%" alt="Image">
                      </div>
                      <div class="col-sm-3">
                        <p>Some text..</p>
                        <img  class="img-responsive" style="width:100%" alt="Image">
                      </div>
                      <div class="col-sm-3">
                        <p>Some text..</p>
                        <img  class="img-responsive" style="width:100%" alt="Image">
                      </div>
                    </div>
                  </div><br><br>

                  <footer class="container-fluid text-center">
                    <p>Footer Text</p>
                  </footer>


</div>
@endsection
