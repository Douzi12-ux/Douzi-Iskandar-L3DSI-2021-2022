@extends('welcome')
@section("sidebar")

<div class="min-height-300 bg-primary position-absolute w-100" >
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 ps" id="sidenav-main">
        <div class="sidenav-header" >
          <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-xl-none" aria-hidden="true" id="iconSidenav"></i>
          <a class="navbar-brand m-0" >
            <img src="../assets/img/logo.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Metqa</span>
          </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="e w-auto ps ps--active-y" id="sidenav-collapse-main">
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
                  <a class="nav-link active" href="{{route('reclamatio')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="ni ni-settings text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Reclamation</span>
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Reclamation') }}
                    <a href="{{route('reclamatio')}}" class="btn btn-primary float-end">back</a></div>
                <div class="card-header">{{ __('Svp sélectionner exactement le problème constaté') }}</div>
                <div class="card-header">{{ __("Remarque : Si vous ne trouvez pas l'option appropriée pour les problèmes, écrivez-la dans la zone de détails en bas.") }}</div>

                <div class="card-body">

                    @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                    @endif
                    @if (\Session::has('field'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{!! \Session::get('field') !!}</li>
                        </ul>
                    </div>
                    </div>
                @endif

                        <form action="{{ url('add_reclamationadmin') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <table class="table">
                                <tr>
                                <div class="mb-3">

                                    <input type="hidden" value="{{Auth::user()->name}}" name="nom" required class="form-control">
                                </div>
                                <div class="mb-3">

                                    <input type="hidden" value="{{Auth::user()->email}}" name="email" required class="form-control">
                                </div>  </tr>
                                <tr>
                                    <td>
                                        <label>
                                            Matériel à réparer
                                          </label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Laptop" name="matriel[]" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                              Laptop
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Ordinateur" name="matriel[]" id="defaultCheck2">
                                            <label class="form-check-label" for="defaultCheck2">
                                              Ordinateur
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="telephone" name="matriel[]" id="defaultCheck3">
                                            <label class="form-check-label" for="defaultCheck3">
                                                telephone
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Imprimante" name="matriel[]" id="defaultCheck4">
                                            <label class="form-check-label" for="defaultCheck4">
                                                Imprimante
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Fax" name="matriel[]" id="defaultCheck5">
                                            <label class="form-check-label" for="defaultCheck5">
                                                Fax
                                            </label>
                                          </div>
                                    </td>
                                    <td>
                                        <label  >
                                            Problèmes
                                          </label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Formatage" name="problems[]" id="defaultCheck6">
                                            <label class="form-check-label" for="defaultCheck6">
                                              Formatage
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Licence" name="problems[]" id="defaultCheck7">
                                            <label class="form-check-label" for="defaultCheck7">
                                              Licence
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Virus" name="problems[]" id="defaultCheck8">
                                            <label class="form-check-label" for="defaultCheck8">
                                              Virus
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Reseaux" name="problems[]" id="defaultCheck9">
                                            <label class="form-check-label" for="defaultCheck9">
                                                Reseaux
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="problème technique" name="problems[]" id="defaultCheck10">
                                            <label class="form-check-label" for="defaultCheck10">
                                                problème technique
                                            </label>
                                          </div>
                                    </td>


                                    <td>
                                        <textarea class="form-control" rows="8" name="matrieldetails" placeholder="details"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label  >
                                       Autres Problèmes / équipement incomplet ..
                                      </label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Souris" name="Autres[]" id="defaultCheck11">
                                        <label class="form-check-label" for="defaultCheck11">
                                          Souris
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Clavier" name="Autres[]" id="defaultCheck12">
                                        <label class="form-check-label" for="defaultCheck12">
                                          Clavier
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Cable" name="Autres[]" id="defaultCheck13">
                                        <label class="form-check-label" for="defaultCheck13">
                                          Cable
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Disque" name="Autres[]" id="defaultCheck14">
                                        <label class="form-check-label" for="defaultCheck14">
                                          Disque
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="écran" name="Autres[]" id="defaultCheck15">
                                        <label class="form-check-label" for="defaultCheck15">
                                        écran
                                        </label>
                                      </div>
                                    </td>
                                    <td><label>

                                       </label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Email" name="Autres[]" id="defaultCheck16">
                                            <label class="form-check-label" for="defaultCheck16">
                                            Email
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="perte de donnees" name="Autres[]" id="defaultCheck17">
                                            <label class="form-check-label" for="defaultCheck17">
                                            perte de donnees
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="navigation trop lente dans notre site" name="Autres[]" id="defaultCheck18">
                                            <label class="form-check-label" for="defaultCheck18">
                                            navigation trop lente dans notre site
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" name="Autres[]" id="defaultCheck19">
                                            <label class="form-check-label" for="defaultCheck19">
                                            Email
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" name="Autres[]" id="defaultCheck20">
                                            <label class="form-check-label" for="defaultCheck20">
                                            Email
                                            </label>
                                        </div>
                                    </td>
                                    <td> <textarea class="form-control" rows="8" name="autresdetails" placeholder="Details"></textarea></td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <label >
                                          Plus De Details
                                        </label>
                                         <textarea class="form-control" rows="6" name="plusdetails" placeholder="Details"></textarea>
                                        </td>
                                </tr>


                            </table>
                            <button type="submit" style="margin-left:35%;width:25%" class="btn btn-success ">envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
