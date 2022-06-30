@extends('welcome')
@section("sidebar")

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
        <div class=" w-auto ps ps--active-y" id="sidenav-collapse-main">
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
                  <a class="nav-link active" href="{{route('commandee')}}">
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


      <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></aside>
  </div>
@endsection
@section('content')
<div class="container card" style="   margin: 132px;
margin-left: 300px;
width: 78%;%
">
<div class="container" >
    <div class="row" >

        <div class="col-md-20" >

            <div class="card" >
                <div class="card-header">
                    <h4>Les Commandes
                    </h4>
                </div>
                <div class="card-body" >
                    <table id="tablecommandes" class="table table-sm table-responsive-sm table-hover">
                        <thead>
                            <tr class="text-center">

                                <th>Référence de Commande</th>
                                <th>Nom de Client</th>
                                <th>Email de Client</th>
                                <th>Status</th>
                                <th>Detail</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($commandes as $key => $commande)


                            <tr class="text-center">
                                <td>{{$commande->commandeRef }}</td>
                                <td>{{$commande->idclients->name }}</td>
                                <td>{{$commande->idclients->email }}</td>



                                @if ($commande->status==1)
                                <td><span style="color: green;" class="fa fa-check pl-3">Confirmer</span></td>
                                <td><a href="{{route('admincommandeshow',$commande->id)}}" class="btn btn-info btn-sm" target="_blank">Facture</a></td>
                                @elseif ($commande->status==2)
                                <td><span style="color: red;" class="bi bi-x">Refuser</span></td>
                                <td><a href="{{route('commandedetailadmin',$commande->id)}}" class="btn btn-info btn-sm">Details de commande</a></td>
                                @else
                                <td><span style="color: rgb(0, 8, 255);" >En Cours..</span></td>
                                <td><a href="{{route('commandedetailadmin',$commande->id)}}" class="btn btn-info btn-sm">Details de commande</a></td>
                             @endif


                            </tr>

                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>

        </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function() {
      $('#tablecommandes').DataTable();
  } );
   </script>
@endsection

