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

      <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></aside>
  </div>
@endsection
@section('content')
<div class="container card" style="    margin: 132px;
margin-left: 300px;
width: 78%;">
<div class="container">
    <div class="row"></div>

        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>Stock
                        <a href="add_stock" class="btn btn-primary float-end">Add stock</a>

                    </h4>
                </div>
                <div class="card-body">
                    @foreach($stocks as $key => $sto)
                    @if ($sto->systemQte==0)

                    <div class="p-3 mb-2 bg-danger text-white" style="width: 40%;">Le system qui a le reference <b>{{$sto->systemRef}}</b> est epuise</div>
                    @elseif ($sto->systemQte<=7)
                    <div class="p-3 mb-2 bg-info text-dark" style="width: 40%;">La Quantite de system qui a le reference <b>{{$sto->systemRef}}</b> est {{$sto->systemQte}}</div>

                    @endif
                    @endforeach
                    <form action="{{ route('simple_search') }}" method="GET">
                        <div class="input-group mb-3" style="width: 50%;margin-left:50%">
                            <select class="form-select" name="searchby" aria-label="Default select example" style="background-color: rgb(156, 218, 245)">

                                <option value="systemRef">Reference</option>
                                <option value="systemNom">Nom de system</option>
                                <option value="systemPrix">Prix De Systeme</option>
                              </select>
                        <input type="text" class="form-control" placeholder=". . . . . . . . . . . . . . . . . . . . . . . . . . ." aria-describedby="basic-addon2" name="search">
                        <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit">Search</button>
                        </div>
                        </div>
                        </form>
                    <table class="table table-sm table-responsive-sm table-hover">
                        <thead>
                            <tr class="text-center">

                                <th>Reference</th>
                                <th>Nom de systeme</th>
                                <th>Prix de systeme</th>
                                <th>Quantite de systeme</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stocks as $key => $sto)
                            <tr class="text-center">

                                <td>{{$sto->systemRef}}</td>
                                <td>{{ $sto->systemNom }}</td>
                                <td>{{ $sto->systemPrix }}</td>
                                <td>{{$sto->systemQte}}</td>
                                <td>

                                  <form action="{{route('delete',$sto->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{route("stockedit",$sto->id)}}" class="btn btn-success ">Modifier</a>
                                <button type="submit" class="btn btn-danger " style="width: 43%">Supprimer</button>
                                </form>

                                </td>
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
@endsection
