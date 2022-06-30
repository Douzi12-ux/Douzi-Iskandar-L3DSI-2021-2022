<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DepartementController extends Controller
{
    public function index()
    {
        if (Auth::user()->role != 1) {
            return redirect()->route('login');
        }

        $departements=Departement::all();
       return view("admin.departement",compact("departements"));

    }

    public function create()
    {

        $departements=Departement::all();
        return view("admin.departement",compact("departements"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255','unique:departements'],
        ]);
        $departements = new Departement();
        $departements->name = $request->name;
        $departements->save();
        return redirect()->back()->with('success', 'Ajoute avec succès');

    }

    public function edit($id)
    {
        $departements=Departement::find($id);
        return view("admin.departementedit",compact("departements"));
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


        $departements = Departement::find($id);
        $departements->name = $request->name;


        $departements->save();
        return redirect()->route('departement')->with('success', 'Modifiè avec succès');
    }

    public function destroy($id)
    {
        Departement::destroy($id);
        return redirect()->back()->with('success', 'Supprime avec succès');
    }
}
