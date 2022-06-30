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
        <div class=" w-auto ps ps--active-y" id="sidenav-collapse-main">
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

          </ul>

      <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></aside>
  </div>
@endsection
@section('content')
<div class="container card" style="    margin: 80px;
margin-left: 300px;
width: 78%;">
<div class="container">
    <div class="row"></div>

        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>Les Commande
                        <a href="{{ route('commandee') }}" class="btn btn-primary float-end">Retour</a>

                    </h4>
                </div>
                <div class="card-body">

<section class="product-area mt-4">
   C'est les detail du Commande de Monsieur : {{ $commande->idclients->name}}<br/>
   Reference de commande :  {{$commande->commandeRef }}<br/><br/>
    <table class="table table-hover">
        <thead>
            <tr class="table-primary" style="width: 10%;text-align:center">
                <td>Nom D'articles</td>
                <td>Prix Unitaire D'articles</td>
                <td>Quantite demander</td>


            </tr>
        </thead>
        <tbody>
            <tr >
                <td style="width: 10%;text-align:center">
                    <div class="media">
                        <div class="media-body">
                            <p class="mt-0 title">
                                @foreach($stocks as $key => $sto)
                                @foreach (json_decode($commande->idarticle) as $idart )
                                @if ($sto->id == $idart)
                                        {{$sto->articleNom}}<hr/>
                                @endif
                                @endforeach

                                @endforeach</p>

                        </div>
                    </div>
                </td>
                <td style="width: 10%;text-align:center">
                    @foreach($stocks as $key => $sto)
                    @foreach (json_decode($commande->idarticle) as $idart )
                    @if ($sto->id == $idart)
                    {{$sto->articlePrixVente}}<hr/>

                    @endif
                    @endforeach

                    @endforeach </td>
                <td style="width: 10%;text-align:center">
                    @foreach($stocks as $key => $sto)
                    @foreach (json_decode($commande->idarticle) as $idart )
                    @if ($sto->id == $idart)
                            {{json_decode($commande->systemQte)[$loop->index]}}<hr/>
                    @endif
                    @endforeach

                    @endforeach
                </td>
            </tr>
            <tr>
                <td style="width: 10%;text-align:center">Prix Totale : {{$commande->prixTotale}} Qr</td>
            </tr>

        </tbody>

    </table>
    @if ($commande->status!=2)
    <button type="button" style="width: 30%;margin-left:35%" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">
        Confirmer
      </button>
      <button type="button" style="width: 30%;margin-left:35%" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModale">
        Refuser
      </button>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Confirmer Commande</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-footer">

              <form action="{{route('confirmecommande',$commande->id)}}" method="post">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Confirmer votre chois</button>
            </form>
            </div>
          </div>
        </div>
      </div>


      <div class="modal fade" id="exampleModale" tabindex="-1" role="dialog" aria-labelledby="exampleModaleLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModaleLabel">Refuser Commande</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-footer">
              <form action="{{route('refusercommande',$commande->id)}}" method="post">
                @csrf
                @method('PATCH')
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Confirmer votre chois</button>
            </form>
            </div>
          </div>
        </div>
      </div>


    @endif

</section>







                </div>
            </div>

        </div>
    </div>
</div>
</div>
@endsection
