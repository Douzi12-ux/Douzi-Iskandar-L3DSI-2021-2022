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
          <a class="navbar-brand m-0" >
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
                  <a class="nav-link active" href="{{route('conreclamation')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">consulter les reclamation</span>
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('archiveingenieur')}}">
                      <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-app text-info text-sm opacity-10"></i>
                      </div>
                      <span class="nav-link-text ms-1">Archivage</span>
                    </a>
                  </li>

          </ul>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 362px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 270px;"></div></div></div>

      <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></aside>
  </div>
@endsection

@section('content')

<div class="container card" style="    margin: 132px;
margin-left: 300px;
width: 78%;">
 <div class="card-header">
    <h4>Reclamation


    </h4>
</div>
<form action="{{ route('search') }}" method="GET">
    <div class="input-group mb-3" style="width: 40%;margin-left:60%">
        <select class="form-select" name="searchby" aria-label="Default select example" style="background-color: rgb(156, 218, 245)">

            <option value="nom">nom</option>
            <option value="email">email</option>

          </select>
    <input type="text" class="form-control" placeholder=". . . . . . . . . . . . . . . . . . . . . . . . . ." aria-describedby="basic-addon2" name="search">
    <div class="input-group-append">
    <button class="btn btn-secondary" type="submit">Search</button>
    </div>
    </div>
    </form>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr style="text-align: center">

                        <th>Nom</th>
                        <th>Email</th>
                        <th>Date </th>
                        <th>status</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach($reclamations as $key => $reclamation)
                    <tr style="text-align: center">

                        <td>{{$reclamation->nom}}</td>
                        <td>{{ $reclamation->email }}</td>
                        <td>{{ $reclamation->created_at}}</td>
                        @if ($reclamation->status==0)
                            <td>En Cours .. </td>
                            @elseif ($reclamation->status==1)
                            <td><span class="fa fa-check pl-3"></span></td>
                            @else
                            <td><span class="bi bi-x">Refuser</span></td>
                        @endif
                        <td class="text-center">
                            <td><a href="{{route('reclamationshow',$reclamation->id   )}}" class="btn btn-info btn-sm">Plus Details</a></td>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
