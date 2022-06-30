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
                <a class="nav-link active" href="{{route('reclamation')}}">
                  <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                  </div>
                  <span class="nav-link-text ms-1">Passer Votre Reclamation</span>
                </a>
              </li>

              <li class="nav-item">
                  <a class="nav-link " href="{{route('chefarchive')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="ni ni-app text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Archivage</span>
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
width: 78%;background-color:#f6f6f6">
  <a style="width: 10%;margin-left:90%" href="{{ route('reclamation') }}" class="btn btn-danger" id="d">Back</a>
<div class="row justify-content-center">


                            <div class="col-5">
                                <p><b>Nom: </b><span>{{$reclamation->nom}}</span></p>
            <p><b>Departement: </b><span>{{$reclamation->iddepartemente->name}}</span></p>
            <p><b>Email: </b><span>{{$reclamation->email}}</span></p>
            @if ($reclamation->matrielAReparer!="null")

                <p><b>Matriel a Reparer: </b><span>
                    @foreach(json_decode($reclamation->matrielAReparer) as $matrielAReparer)
                    {{ $matrielAReparer }}
                  @endforeach
                  </span></p>



                @endif
                @if ($reclamation->problems!='null')
                <p><b>Problems: </b><span>
                    @foreach(json_decode($reclamation->problems) as $problems)
                    {{ $problems }}
                  @endforeach
                    </span></p>
                @endif
                @if ($reclamation->details!=null)
                <p><b>Detail: </b><span>{{$reclamation->details}}</span></p>
                @endif
            </div>

            <div class="col-4" >
                @if ($reclamation->Autres!="null")
                <p><b>probleme system: </b><span>
                    @foreach(json_decode($reclamation->Autres) as $Autres)
                    {{ $Autres }}
                  @endforeach</span></p>
                @endif
                @if ($reclamation->autresdetails!=null)
                <p><b>Detail: </b><span>{{$reclamation->autresdetails}}</span></p>
                @endif
                @if ($reclamation->plusdetails!=null)
                <p><b>Plus de Detail: </b><span>{{$reclamation->plusdetails}}</span></p>
                @endif




                                </div>


                                    <button disabled class="btn btn-info btn-sm"></button>




                                    @if ($reclamation->status==1)
                                    <button type="submit" disabled  class="btn btn-success btn-sm">Confirmer a {{$reclamation->updated_at}}
                                    Message : Monsieur {{$reclamation->nom}} Le chef d'epartement {{$reclamation->iddepartemente->name}} Merci pour votre reclamation <br/>
                                    je vais régler le problème Dans pas plus de deux jours </button>
                                    @elseif ($reclamation->status==2)
                                    <button type="submit" disabled  class="btn btn-danger btn-sm">Refuser a {{$reclamation->updated_at}}
                                        Message : Monsieur {{$reclamation->nom}} Le chef d'epartement {{$reclamation->iddepartemente->name}} Merci pour votre reclamation <br/>
                                        Votre demande est maintenant considérée comme temporairement rejetée en raison d'un manque d'équipement ou d'autre chose</button>
                                    @else
                                    <button type="submit" disabled style="width: 20%" class="btn btn-info btn-sm">Status : En Cours ...</button>
                                    <button type="button" class="btn btn-danger" style="width: 20%;margin-left:10%" data-toggle="modal" data-target="#exampleModalee">
                                        Supprimer
                                      </button>
                                      <!-- Modal -->
                                      <div class="modal fade" id="exampleModalee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Supprimer le Reclamation</h5>



                                            </div>

                                            <div class="modal-footer">
                                    <form action="{{route('saupprimerreclamation',$reclamation->id)}}" method="post">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Confirmer votre chois</button>
                                    </form>
                                            </div>
                                        </div></div></div>

                                    @endif


@endsection


