<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes =Commande::all()->sortDesc();
         $stocks = Stock::all()->sortDesc();;
       return view("client.commande",compact("commandes","stocks"));
    }

    public function indexAPI()
    {

       $commandes =Commande::all();

       $articles = '';

       foreach ($commandes as $i => $a) {
        $a->nomclient = $a->idclients->name;
        $a->emailclient = $a->idclients->email;
        foreach (json_decode($a->idarticle) as $b){
            $b = Stock::find($b);
            $articles .=" ".$b->articleNom.' '.$b->articlePrixVente.' QR <br/><br/>';
        }
        $a->idarticle = $articles;
        $articles = '';
    }
    return $commandes;
    }

    public function indexAPII()
    {

       $commandes =Commande::all()->pluck('idarticle');

       return $commandes;
    }



    public function index1()
    {

       $commandes =Commande::all();
       return view("admin.commande",compact("commandes"));
    }

    public function index2()
    {

       $commandes =Commande::all();
       return view("admin.commconfirmer",compact("commandes"));
    }

    public function countCommandeConfirmer(){
        $commandes = Commande::where('status',1)->count();
        return $commandes;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stocks =Stock::all();
        $commandes =Commande::all();
       return view("client.createcommande",compact("commandes","stocks"));



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rr=[];
        $commande = new Commande;
        $commande->commandeRef = $request->commandeRef;
        $commande->idclient = $request->id;
        $commande->idarticle = json_encode($request->idarticle);

        $total = 0;
        foreach ($request->article as $key =>$value) {

            if ($value != null) {

                array_push($rr, $value);


            }
        }
        foreach($rr as $key =>$value){
            $artqte = Stock::find($request->idarticle[$key]);
            if ($artqte->articleQte>=$value) {
                $artqte->articleQte-=$value;
                $artqte->save();
            }else {
                return Redirect::back()->withErrors(['msg' => 'Quantité insuffisante']);
            }
        }
        foreach (json_decode($commande->idarticle) as $key => $value) {
                $prix = Stock::find($value)->articlePrixVente * $rr[$key];
                $total += $prix;
        }


        $commande->systemQte = json_encode($rr);
        $commande->prixTotale = $total;

        $commande->save();

       return redirect()->route('commande');
    }


    public function storeApi(Request $request)
    {
        $rr=[];
        $commande = new Commande;
        $commande->commandeRef = Rand(10000, 10000000000000000);
        $commande->idclient = $request->idclient;
        $commande->idarticle = json_encode($request->idarticle);

        $total = 0;
        foreach ($request->systemQte as $key =>$value) {

            if ($value != null) {
                array_push($rr, $value);
            }
        }

        foreach (json_decode($commande->idarticle) as $key => $value) {
                $prix = Stock::find($value)->articlePrixVente * $rr[$key];
                $total += $prix;
        }
        $commande->systemQte = json_encode($rr);


        $commande->prixTotale = $total;
       $commande->save();

      return $commande;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commande = Commande::find($id);
        $stocks = Stock::all();

        return view('client.commandeshow',compact('commande','stocks'));
    }

    public function showadminfact($id)
    {
        $commande = Commande::find($id);
        $stocks = Stock::all();

        return view('admin.commandeshow',compact('commande','stocks'));
    }

    public function showadminfactAPI($id)
    {
        $commande = Commande::find($id);
        $stocks = Stock::all();
$g=$commande.$stocks ;
        return $g;
    }


    public function showdetail($id)
    {
        $commande = Commande::find($id);
        $stocks = Stock::all();
        return view('client.detail',compact('commande','stocks'));
    }

    public function showdetailadmin($id)
    {
        $commande = Commande::find($id);
        $stocks = Stock::all();
        return view('admin.detailcommande',compact('commande','stocks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $commande=Commande::all();
        return view("users.edit",compact("commande"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirmer(Request $request, $id)
    {

        $commande = Commande::find($id);
        $h=1;
        $commande->status = $h;
        $commande->prixTotale += 14;
        $commande->save();
        return redirect()->route('commandee');
    }

    public function refuser(Request $request, $id)
    {

        $commande = Commande::find($id);
        $h=2;
        $commande->status = $h;
        $commande->save();
        return redirect()->route('commandee');
    }

    public function confirmerAPI(Request $request,$id)
    {
        $commande=Commande::find($id);

        $commande->status = $request->status;

        $commande->save();
        return $commande;

    }

    public function refuserAPI(Request $request,$id)
    {
        $commande=Commande::find($id);

        $commande->status = $request->status;

        $commande->save();
        return $commande;

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Commande::destroy($id);
        return redirect()->route('commande');
    }
}
