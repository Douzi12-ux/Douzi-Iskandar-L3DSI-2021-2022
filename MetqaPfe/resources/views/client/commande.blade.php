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
          <i class="fas fa-times p-6 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-xl-none" aria-hidden="true" id="iconSidenav"></i>
          <a class="navbar-brand m-4"  target="_blank">
            <img style="width: 100%" src="../assets/img/logo.png" class="navbar-brand-img h-100" alt="main_logo">

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
                    <span class="nav-link-text ms-1">Les Fournisseur</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="{{route('commande')}}">
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

          </ul>

      <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></aside>
  </div>
@endsection
@section('content')
<div class="container card" style="    margin: 132px;
margin-left: 300px;
width: 78%;">

                <div class="card-header">
                    <h4>Les Commande
                        <a href="add_commande" class="btn btn-primary float-end">Passer un Commande</a>

                    </h4>
                </div>
                <div class="card-body">
                    <table id="tablecomm" class="table table-sm table-responsive-sm table-hover">
                        <thead>
                            <tr class="text-center">

                                <th>Reference</th>
                                <th>Date de Creation </th>

                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($commandes as $key => $commande)
                            @if (Auth::user()->id==$commande->idclient)

                            <tr class="text-center">
                                <td>{{$commande->commandeRef }}</td>
                                <td>
                                    {{$commande->created_at }}
                                </td>


                                @if ($commande->status==1)
                                <td><span class="fa fa-check pl-3"></span></td>
                                <td><a href="{{route('commandeshow',$commande->id   )}}" class="btn btn-info btn-sm" target="_blank">Facture</a></td>
                                @elseif ($commande->status==2)
                                <td><span class="bi bi-x">Refuser</span></td>
                                @else
                                <td><span class="fa fa-minus pl-3"></span></td>
                                <td >
                                    <form action="{{route('deletecommande',$commande->id)}}" method="post">
                                      @csrf
                                      @method('delete')
                                <a href="{{route('commandedetail',$commande->id)}}" class="btn btn-info btn-sm" style="width: 30%">detail</a>
                                  <button type="submit" class="btn btn-danger btn-sm" >Supprimer</button>
                                  </form>

                                  </td>
                            @endif
                                </td>


                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>



</div>
</div>
<script>
    $(document).ready(function() {
      $('#tablecomm').DataTable();
  } );
   </script>
@endsection
