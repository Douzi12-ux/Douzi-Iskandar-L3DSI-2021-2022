@extends('welcome')
@section("sidebar")

<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<div class="min-height-300 bg-primary position-absolute w-100">
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 ps" id="sidenav-main">
        <div class="sidenav-header">
          <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-xl-none" aria-hidden="true" id="iconSidenav"></i>
          <a class="navbar-brand m-0">
            <img src="../assets/img/logo.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Metqa</span>
          </a>
        </div>
        <hr class="horizontal dark mt-0" >
        <div class="w-auto ps ps--active-y" id="sidenav-collapse-main">
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
              <a class="nav-link " href="{{route('users.index')}}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-circle-08 text-warning text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Utilisateurs</span>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('departement')}}">
                  <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-building text-warning text-sm opacity-10"></i>
                  </div>
                  <span class="nav-link-text ms-1">Departement</span>
                </a>
              </li>
            <li class="nav-item">
              <a class="nav-link " href="{{route('fournisseur')}}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-user-run text-success text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Partenaire</span>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('stock')}}">
                  <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-shop text-info text-sm opacity-10"></i>
                  </div>
                  <span class="nav-link-text ms-1">Stock</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="{{route('commandee')}}">
                  <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-cart text-danger text-sm opacity-10"></i>
                  </div>
                  <span class="nav-link-text ms-1">commande</span>
                </a>
              </li>
            <li class="nav-item">
              <a class="nav-link " href="{{route('toutarchive')}}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-app text-info text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Archivage</span>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('reclamatio')}}">
                  <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-settings text-info text-sm opacity-10"></i>
                  </div>
                  <span class="nav-link-text ms-1">Reclamation</span>
                </a>
              </li>



          </ul>

  </div>
@endsection
@section('content')
<sup>
<div class="container">
    <div class="row justify-content-center" style="margin-left: 10%">
        <div class="col-md-12">
            <section class="content">
                <div class="container-fluid">
                  <!-- Small boxes (Stat box) -->
                  <div class="row">
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h3>{{$users}}</h3>

                          <p>Totale Users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="{{route('users.index')}}" class="small-box-footer">Plus Details <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-success">
                        <div class="inner">
                          <h3>{{$userss}}   </h3>

                          <p>Totale CLient</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <a href="{{route('client')}}" class="small-box-footer">Plus Details <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6" style="color: white">
                      <!-- small box -->
                      <div class="small-box bg-warning">
                        <div class="inner">
                          <h3 style="color: white">{{$commande}}</h3>

                          <p style="color: white">Commande Confirmer</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-truck"></i>
                        </div>
                        <a href="{{route('commandes')}}"  class="small-box-footer" style="color: white">Plus Details <i style="color: white" class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-danger">
                        <div class="inner">
                          <h3>{{$archive}}</h3>

                          <p>Fichier Archiver</p>
                        </div>
                        <div class="icon">
                          <i class="bi bi-archive-fill"></i>
                        </div>
                        <a href="{{route('toutarchive')}}" class="small-box-footer">Plus Details <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                  </div>

        </div>
    </div>
</div>accounts
</sup>
@include("admin.chart",['accepte' => $commandea, 'refuse' => $commander, 'encours' => $commandeec,'reclamationen' => $reclamationencourss,'reclamationa' => $reclamationac,'reclamationr' => $reclamationre])
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
@endsection
