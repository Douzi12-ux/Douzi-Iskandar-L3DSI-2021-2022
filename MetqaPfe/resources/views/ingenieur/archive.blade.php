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
                  <a class="nav-link " href="{{route('conreclamation')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">consulter les reclamation</span>
                  </a>
                </li>

              <li class="nav-item">
                  <a class="nav-link active" href="{{route('archiveingenieur')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="ni ni-app text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Archivage</span>
                  </a>
                </li>

          </ul>

      <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></aside>
  </div>
@endsection
@section('content')
<div class="container card" style="    margin: 132px;
margin-left: 300px;
width: 79%;">

                <div class="card-header">
                    <h4>Archive
                        <a href="add_fichier_ing" class="btn btn-primary float-end">Add Fichier</a>

                    </h4>
                    @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="card-body">

                    <table id="tablearchis" class="table table-sm table-responsive-sm table-hover">
                        <thead>
                            <tr class="table-info " style="text-align:center">

                                <th class="text-center">departement</th>
                                <th class="text-center">description</th>
                                <th class="text-center">fichier</th>
                                <th class="text-center">Date d'archivage</th>
                                <th class="text-center">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($archives as $key => $archiv)
                            <tr class="text-center">
                                  <td>

                                {{$archiv->iddepartemente->name  }}
                                </td>
                                <td>{{$archiv->description}}</td>
                                <td ><a href="uploads/archives/{{ $archiv->fichier }}" target="_blank"><img style="width: 35px" src="{{asset('assets/img/dow.png')}}" /></a></td>
                                <td >{{$archiv->created_at}}</td>
                                <td >
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModale">
                                        Supprimer
                                      </button>
                                      <!-- Modal -->
                                      <div class="modal fade" id="exampleModale" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Supprimer Le Fichier</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>

                                            <div class="modal-footer">
                                    <form action="{{route('suppfileee',$archiv->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Confirmer votre chois</button>
                                    </form>


                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

</div>
</div>
<script>
    $(document).ready(function() {
        $('#tablearchis').DataTable();
    } );
    </script>
@endsection
