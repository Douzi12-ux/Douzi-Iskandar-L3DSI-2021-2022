@extends('welcome')
@section('sidebar')

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
        <aside
            class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 ps"
            id="sidenav-main">
            <div class="sidenav-header">
                <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-xl-none"
                    aria-hidden="true" id="iconSidenav"></i>
                <a class="navbar-brand m-0">
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
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps__rail-y" style="top: 0px; height: 362px; right: 0px;">
                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 270px;"></div>
                </div>
            </div>

            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; right: 0px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
        </aside>
    </div>
@endsection
@section('content')
    <div class="container card" style="    margin: 80px;
    margin-left: 320px;
    width: 80%;">
        <div class="container">
                    <div class="card-header">
                        <h4>commande
                            <a href="{{route('commande')}}" class="btn btn-primary float-end">back</a>

                        </h4>
                        @if ($errors->any())
                        <h6 style="background-color: red">{{ $errors->first() }}</h6>
                    @endif
                    </div>
                    <div class="card-body">

                        <form action="{{ url('add_commande') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <input type="hidden" value="{{ Rand(10000, 10000000000000000) }}" name="commandeRef" required
                                    class="form-control">
                            </div>
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}" >

                            <table class="table" >
                            @foreach($stocks as $key => $sto)
                            @if ($sto->articleQte!=0)


                            <tr style="border: 2px solid;height:10% ;">


                                <td style="width:10%;border: 2px solid;">

                                    <img src="uploads/stocks/{{ $sto->image }}" style="display:block; width:100%; height:auto;"></img>

                                </td>
                                <td  style="width:30%;border: 2px solid;">

                                    Nom d'article : {{ $sto->articleNom }} <br/><br/>
                                    Prix Unitaire d'article : {{ $sto->articlePrixVente }} QR<br/><br/>
                                    Quantite dans stock : {{ $sto->articleQte }} <br/><br/>

                            </td>
                            <td  style="width:10%;border: 2px solid;">
                              <br/><br/><br/><br/><br/>
                                <input type="checkbox" id="{{ $sto->id }}" onclick="fAddText({{ $sto->id }})" value="{{ $sto->id }}" name="idarticle[]" style="display:block; width:100%; height:auto;" />
                                <br/><br/>
                                <div id="Cible{{ $sto->id }}"></div>






                        </td>

                        </tr>
                        @endif
                              @endforeach
                            </table>
                            <button type="submit" class="btn btn-primary">add</button>
                        </form>

                    </div>
                </div>


    </div>
    </div>
@endsection

<script type="text/javaScript">
    function fAddText(id) {
        var checkBox = document.getElementById(id);
        if (checkBox.checked == true){
 document.getElementById('Cible'+id).innerHTML ='<input type="text" name="article[]"  class="form-control">';
  } else {
    document.getElementById('Cible'+id).innerHTML = "";
  }


    }
</script>




