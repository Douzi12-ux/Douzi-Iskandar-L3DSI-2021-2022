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
        <div class="w-auto ps ps--active-y" id="sidenav-collapse-main">
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
                <a class="nav-link active" href="{{route('fournisseur')}}">
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

          </ul>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 362px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 270px;"></div></div></div>

      <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></aside>
  </div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('Partenaire') }}
                <a href="{{route('fournisseur')}}" class="btn btn-primary float-end">back</a></div>
            <form method="POST" action="{{ route('fournisseurupdate', $fournisseurs->id) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('PUT') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('Nom') }} <span
                                class="form-required"></span></label>
                        <input id="name" type="text"
                            class="form-control" name="nom"
                            value="{{ $fournisseurs->nom }}" required>

                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email"
                            class="form-control" name="email"
                            value="{{ $fournisseurs->email }}" required>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Telephone</label>
                        <input id="password" type="text"
                            class="form-control" name="phone" value="{{ $fournisseurs->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="file" class="form-label">Logo</label>
                        <input id="file" type="file"
                            class="form-control" name="logo" value="{{ $fournisseurs->logo_image }}">
                    </div>
                </div>
                <div class="card-footer">
                   <input type="submit" value="valider">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
