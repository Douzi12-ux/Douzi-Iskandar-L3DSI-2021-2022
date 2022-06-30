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

          </ul>

      <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></aside>
  </div>
@endsection
@section('content')
<div class="container card" style="    margin: 132px;
margin-left: 300px;
width: 78%;background-color:#f6f6f6">
  <a style="width: 10%;margin-left:90%" href="{{ route('conreclamation') }}" class="btn btn-danger" id="d">Back</a>
<div class="row justify-content-center">
    <!doctype html>
    <html lang="en">
      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <!-- Custom Style -->
        <link rel="stylesheet" href="style.css">

        <title>Reclamation</title>
    </head>

    <body >

                            <div class="col-5">
                                <p><b>Nom: </b><span>{{$reclamation->nom}}</span></p>
                                <p><b>Departement: </b><span>{{$reclamation->iddepartemente->name}}</span></p>
                                <p><b>Email: </b><span>{{$reclamation->email}}</span></p>
                                @if (($reclamation->matrielAReparer!='null')&&(json_decode($reclamation->matrielAReparer)!=["=>"]))

                                    <p><b>Matriel a Reparer: </b><span>
                                        @foreach(json_decode($reclamation->matrielAReparer) as $matrielAReparer)
                                        {{ $matrielAReparer }}
                                      @endforeach
                                      </span></p>
                                    @endif

                                    @if  (($reclamation->problems!='null')&&(json_decode($reclamation->problems)!=["=>"]))
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
                                    @if (($reclamation->Autres!='null')&&(json_decode($reclamation->Autres)!=["=>"]))
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
@if ($reclamation->status==0)
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
          <h5 class="modal-title" id="exampleModalLabel">Confirmer Reclamation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-footer">
<form action="{{route('confirmereclamation',$reclamation->id)}}" method="post">
    @csrf
    @method('PATCH')
    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Confirmer votre chois</button>
</form>
</div>
</div>
</div>
</div>
<div class="modal fade" id="exampleModale" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmer Commande</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-footer">
<form action="{{route('refuserreclamation',$reclamation->id)}}" method="post">
    @csrf
    @method('PATCH')
    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Confirmer votre chois</button>
</form>
</div>
</div>
</div>
</div>
@elseif ($reclamation->status==1)
<button type="submit" disabled style="width: 30%;margin-left:35%" class="btn btn-success btn-sm">Confirmer a {{$reclamation->updated_at}}</button>
@else
<button type="submit" disabled style="width: 30%;margin-left:35%" class="btn btn-danger btn-sm">Refuser a {{$reclamation->updated_at}}</button>
@endif










    </body></html>




@endsection


