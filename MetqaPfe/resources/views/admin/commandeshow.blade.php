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
<body onload="window.print()">
  <a style="width: 10%;margin-left:90%" href="{{ route('commandee') }}" class="btn btn-danger" id="d">Back</a>
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

        <title>{{$commande->idclients->name}} Facture {{$commande->updated_at}}</title>
    </head>

    <body >
        <div class="my-5 page" size="A4">
            <div class="p-5">
                <section class="top-content bb d-flex justify-content-between">
                    <div class="logo">
                        <img style="width: 80%;" src="../assets/img/logo.png" alt="" class="img-fluid">
                    </div>

                </section>



                <section class="store-user mt-5">
                    <div class="col-10">
                        <div class="row bb pb-3">
                            <div class="col-7">
                                <p>Supplier,</p>
                                <h5>Milipol Equipement Trading & Services</h5>
                                <p class="address"> Zone 40, Street 820, Building 63 <br> P.O Box 45731, <br>New Slata, Doha Qatar</p>
                                <div class="txn mt-2">Fixe: +974 4431 5335</div>
                            </div>
                            <div class="col-5">


                                <div class="txn mt-2">Client : {{$commande->idclients->name}}</div>
                                <div class="txn mt-2">Email : {{$commande->idclients->email}}</div><br/><br/><br/>
                                <div class="row extra-info pt-6">
                                    <p><b>Invoice No: </b><span>{{$commande->commandeRef}}</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="row extra-info pt-3">

                            <div class="col-5">
                                <p>Deliver Date: <span>{{$commande->updated_at}}</span></p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="product-area mt-4">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>Item Description</td>
                                <td>Price</td>
                                <td>Quantity</td>
                            </tr>

                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="mt-0 title">@foreach($stocks as $key => $sto)
                                                @foreach (json_decode($commande->idarticle) as $idart )
                                                @if ($sto->id == $idart)
                                                        {{$sto->articleNom}}<hr/>
                                                @endif
                                                @endforeach

                                                @endforeach</p>

                                        </div>
                                    </div>
                                </td>
                                <td>@foreach($stocks as $key => $sto)
                                    @foreach (json_decode($commande->idarticle) as $idart )
                                    @if ($sto->id == $idart)
                                    {{$sto->articlePrixVente}} Qr<hr/>

                                    @endif
                                    @endforeach

                                    @endforeach </td>
                                <td>@foreach($stocks as $key => $sto)
                                    @foreach (json_decode($commande->idarticle) as $idart )
                                    @if ($sto->id == $idart)
                                            {{json_decode($commande->systemQte)[$loop->index]}}<hr/>
                                    @endif
                                    @endforeach

                                    @endforeach</td>

                            </tr>

                        </tbody>
                    </table>
                </section>

                <section class="balance-info">
                    <div class="row">
                        <div class="col-8">
                            <p class="m-0 font-weight-bold"> Note: </p>
                            <p>You must be in our company 10 days before the confirmation of this order with this bill</p>
                        </div>
                        <div class="col-4">
                            <table class="table border-0 table-hover">

                                <tr>
                                    <td>Tax:</td>
                                    <td>14QR</td>
                                </tr>

                                <tfoot>
                                    <tr>

                                        <td>Totale avec tax :</td>
                                        <td>{{$commande->prixTotale}} Qr</td>
                                    </tr>
                                </tfoot>
                            </table>

                            <!-- Signature -->
                            <div class="col-12">
                                <img src="signature.png" class="img-fluid" alt="">
                                <p class="text-center m-0"> Director Signature </p>
                                <img style="width: 90%" src="../assets/img/signature.png" >
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Cart BG -->


                <footer>

                </footer>
            </div>
        </div>

        <div class="div1">
            <input type="button" style="background-color:blue;color:white;"value="Print This Facture" class="noprint" onclick="window.print();return false;">
            </div>



    </body></html>


            </div>
        </div>
    </div>
</div>
</div>
</body>
<style>
    @media print {

    .div1 {display:none;}
    #d {display:none;}



}
</style>



