@extends('welcome')
@section("sidebar")
<style>
    @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap');*{padding: 0px;margin: 0px}body{color:#fff;font-family: 'Manrope', sans-serif}.icon{cursor: pointer;margin-right: 50px;line-height: 60px}.icon span{background: #f00;padding: 7px;border-radius: 50%;color: #fff;vertical-align: top;margin-left: -25px}.icon img{display: inline-block;width: 26px;margin-top: 4px}.icon:hover{opacity: .7}.logo{flex: 1;margin-left: 50px;color: #eee;font-size: 20px;font-family: monospace}.notifications{z-index:999;width: 300px;height: 0px;opacity: 0;position: absolute;top: 63px;right: 62px;border-radius: 5px 0px 5px 5px;background-color: #fff;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)}.notifications h2{font-size: 14px;padding: 10px;border-bottom: 1px solid #eee;color: #999}.notifications h2 span{color: #f00}.notifications-item{display: flex;border-bottom: 1px solid #eee;padding: 6px 9px;margin-bottom: 0px;cursor: pointer}.notifications-item:hover{background-color: #eee}.notifications-item img{display: block;width: 50px;height: 50px;margin-right: 9px;border-radius: 50%;margin-top: 2px}.notifications-item .text h4{color: #777;font-size: 16px;margin-top: 3px}.notifications-item .text p{color: #aaa;font-size: 20px}
</style>
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
                  <a class="nav-link active" href="{{route('stock')}}">
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
<div class="container card" style="    margin: 85px;
margin-left: 300px;
width: 100%;">

                <div class="card-header">
                    <h4>Stock
                        <div class="icon" style="margin-left: 70%" id="bell"><i class="ni ni-notification-70 text-info text-sm "><span style="margin-left: 10%" class="badge badge-light">{{$a}}</span></i> </div>
    <div class="notifications" id="box">


        <h2>Notifications - <span>{{$a}}</span></h2>
        @foreach($stock as $key => $sto)
        @if ($sto->articleQte==0)
        <div class="notifications-item">
            <div class="text p-1 mb-1 bg-danger text-dark">
                    <p>L'article qui a le reference <b>{{$sto->articleRef}}</b> est épuisé</p>
            </div>
        </div>
        @elseif ($sto->articleQte<=5)
        <div class="notifications-item">
            <div class="text p-1 mb-1 bg-warning text-dark">
                    <p>La Quantite d'article qui a le reference <b>{{$sto->articleRef}}</b> est {{$sto->articleQte}}</p>

                </div>
    </div>
        @endif
         @endforeach

    </div>


                        <a href="add_stock" class="btn btn-primary float-end">Add stock</a>

                    </h4>
                    @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
    @endif
            @if ($errors->any())
    <div class="alert alert-warning text-white">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                </div>
                <div class="card-body">


                    <table id="tablestocks" class="table table-sm table-responsive-sm table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>image</th>
                                <th>Reference</th>
                                <th>Nom d'article</th>
                                <th>Prix d'article</th>
                                <th>Quantite d'article</th>
                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stock as $key => $sto)
                            <tr class="text-center">
                                <td style="width:10%"><img src="uploads/stocks/{{ $sto->image }}" style="width:40%;margin-left:30%"></img></td>
                                <td>{{$sto->articleRef}}</td>
                                <td>{{ $sto->articleNom }}</td>
                                <td>{{ $sto->articlePrixVente }}</td>
                                <td>{{$sto->articleQte}}</td>
                                <td>
                                    <a href="{{route("stockedit",$sto->id)}}" class="btn btn-success ">Modifier</a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModale">
                                        Supprimer
                                      </button>
                                      <!-- Modal -->
                                      <div class="modal fade" id="exampleModale" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Supprimer l'article</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>

                                            <div class="modal-footer">
                                  <form action="{{route('delete',$sto->id)}}" method="post">
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
      $('#tablestocks').DataTable();
  } );

  $(document).ready(function(){




            var down = false;

            $('#bell').click(function(e){

                var color = $(this).text();
                if(down){

                    $('#box').css('height','0px');
                    $('#box').css('opacity','0');
                    $('#box').css('display','none');
                    down = false;
                }else{

                    $('#box').css('height','auto');
                    $('#box').css('opacity','1');
                    $('#box').css('display','block');
                    down = true;

                }

            });

                });
   </script>
@endsection
