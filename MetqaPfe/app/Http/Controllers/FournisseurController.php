<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FournisseurController extends Controller
{
    public function index()
    {

        $fournisseur=Fournisseur::all()->sortDesc();
       return view("fournisseur.index",compact("fournisseur"));

    }


    public function index1()
    {
        if (Auth::user()->role != 2) {
            return redirect()->route('login');
        }
        $fournisseur=Fournisseur::all();
       return view("client.fournisseur",compact("fournisseur"));

    }

    public function indexAPI(){
        $url='http://192.168.125.159:8000/';
        $fournisseur=Fournisseur::all()->sortDesc();
        foreach ($fournisseur as $key => $a) {

            $a->Src = $url."/uploads/fournisseurs/".$a->logo_image;
        }
        return $fournisseur;

   }

   public function search($nom)
    {
        $search=Fournisseur::where('nom','like','%'.$nom.'%')->get();
        return $search;
    }

    public function create()
    {
        $fournisseurs=Fournisseur::all();
       return view("fournisseur.create",compact("fournisseurs"));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255','unique:fournisseurs'],
            'email' => ['required', 'string', 'max:255','unique:fournisseurs'],
            'phone' => ['required', 'string', 'max:255','unique:fournisseurs'],
            'logo_image' => ['required', 'max:255','unique:fournisseurs'],
        ]);
        $fournisseur = new Fournisseur();
        $fournisseur->nom = $request->input('nom');
        $fournisseur->email = $request->input('email');
        $fournisseur->phone = $request->input('phone');
        if($request->hasfile('logo_image'))
        {
            $file = $request->file('logo_image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/fournisseurs/', $filename);
            $fournisseur->logo_image = $filename;
        }
        $fournisseur->save();
        return redirect()->route('fournisseur')->with('success', 'Ajoute avec succès');

    }

    public function storefournisseursAPI(Request $request)
    {
        $fournisseur = new Fournisseur();
        $fournisseur->nom = $request->input('nom');
        $fournisseur->email = $request->input('email');
        $fournisseur->phone = $request->input('phone');
        if($request->hasfile('logo_image'))
        {
            $file = $request->file('logo_image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/fournisseurs/', $filename);
            $fournisseur->logo_image = $filename;
        }
        $fournisseur->save();
        return $fournisseur;
    }

    public function edit($id)
    {

        $fournisseurs=Fournisseur::find($id);
        return view("fournisseur.edit",compact("fournisseurs"));
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


        $fournisseurs = Fournisseur::find($id);
        $fournisseurs->nom = $request->input('nom');
        $fournisseurs->email = $request->input('email');
        $fournisseurs->phone = $request->input('phone');
        if($request->hasfile('logo'))
        {
            $file = $request->file('logo');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/fournisseurs/', $filename);
            $fournisseurs->logo_image = $filename;
        }
        $fournisseurs->save();
        return redirect()->route('fournisseur')->with('success', 'Modifiè avec succès');
    }

    public function destroy($id)
    {
        Fournisseur::destroy($id);
        return redirect()->route('fournisseur')->with('success', 'Supprimer avec succès');

    }

    public function destroyFourAPI($id)
    {
        $fournisseur=Fournisseur::destroy($id);
        return $fournisseur;
    }
}
