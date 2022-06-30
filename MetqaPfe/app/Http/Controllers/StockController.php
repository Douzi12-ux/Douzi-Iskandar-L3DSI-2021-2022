<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StockController extends Controller
{


    public function index()
    {
        if (Auth::user()->role != 1) {
            return redirect()->route('login');
        }
       $stock =Stock::all()->sortDesc();
       $a=Stock::where('articleQte','<', 6)->count();

       $fournisseur =Fournisseur::all();
       return view("admin.stock",compact("stock","fournisseur","a"));
    }

    public function indexAPI(){
        $url='http://192.168.125.159:8000/';
        $stock= Stock::all();
        foreach ($stock as $key => $a) {

            $a->fichierSrc = $url."/uploads/stocks/".$a->image;
        }
        return $stock;

   }
   public function createFournisseursAPI()
    {
       $fournisseur=Fournisseur::all();

       return $fournisseur;


    }

   public function search($nom)
    {
        $search=Stock::where('systemNom','like','%'.$nom.'%')->get();
        return $search;
    }


    public function create()
    {
        $fournisseurs=Fournisseur::all();
       return view("admin.stockcreate",compact("fournisseurs"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'articleNom' => ['required', 'string', 'max:255','unique:stocks'],
            'articleRef' => ['required', 'string','unique:stocks'],
            'articlePrixVente' => ['required', 'integer', ],
            'articleQte' => ['required', 'integer', ],
            'image' => ['required', 'max:255'],
            'fournisseur' => ['required', 'max:255'],
        ]);
        $stock = new Stock();
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/stocks/', $filename);
            $stock->image = $filename;
        }
        $stock->articleRef = $request->input('articleRef');
        $stock->articleNom = $request->input('articleNom');
        $stock->articlePrixVente = $request->input('articlePrixVente');
        $stock->articleQte = $request->input('articleQte');
        $stock->fournisseur = $request->fournisseur;
        $stock->save();
        return redirect()->route('stock')->with('success', 'Ajoute avec succès');
    }

    public function storeStocksAPI(Request $request)
    {
        $stock = new Stock();
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/stocks/', $filename);
            $stock->image = $filename;
        }
        $stock->articleRef = $request->input('articleRef');
        $stock->articleNom = $request->input('articleNom');
        $stock->articlePrixVente = $request->input('articlePrixVente');
        $stock->articleQte = $request->input('articleQte');
        $stock->fournisseur = $request->input('fournisseur');
        $stock->save();
        return $stock;
    }

    public function edit($id)
    {
        $stock =Stock::all();
        $stock=Stock::find($id);
        return view("admin.stockedit",compact("stock"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $stock = Stock::find($id);
        $stock->articleRef = $request->systemRef;
        $stock->articleNom = $request->systemNom;
        $stock->articlePrixVente = $request->systemPrix;
        $stock->articleQte = $request->systemQte;

        $stock->save();
        return redirect()->route('stock')->with('success', 'Modifiè avec succès');
    }

    public function updateStockAPI(Request $request,$id)
    {
        $stocks=Stock::find($id);
        $stocks->articleRef = $request->articleRef;
        $stocks->articleNom = $request->articleNom;
        $stocks->articlePrixVente = $request->articlePrixVente;
        $stocks->articleQte = $request->articleQte;
        $stocks->fournisseur = $request->fournisseur;

        $stocks->save();
        return $stocks;

    }

    public function image(Request $request, $id)
    {

        $stocks = Stock::find($id);
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/stocks/', $filename);
            $stocks->image = $filename;
        }
        $stocks->save();
        return $stocks;
    }

    public function show($id)
    {
        $stocks= Stock::where('id', $id)->pluck('id');
        return $stocks;
    }

    public function destroy($id)
    {
        Stock::destroy($id);
        return redirect()->route('stock')->with('success', 'Supprimer avec succès');
    }

    public function destroyStockAP($id)
    {
        $stock=Stock::destroy($id);
        return $stock;
    }
}
