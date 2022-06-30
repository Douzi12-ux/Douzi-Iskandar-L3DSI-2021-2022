<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChefarchiveController extends Controller
{
    public function index()
    {
        if ((Auth::user()->role == 1)&&(Auth::user()->role == 4)) {
            $chefarchive=Archive::all();
        }else {
            $chefarchive=Archive::where('iddepartement',Auth::user()->iddepartement)->get();
        }

    return view("chef.index",compact("chefarchive"));
    }
    public function create()
    {
       return view("chef.create");
    }
    public function store(Request $request)
    {
        $request->validate([
            'description' => ['required', 'string', 'max:255','unique:archives'],

        ]);
        $chefarchive = new Archive();
        $chefarchive->iddepartement =Auth::user()->iddepartement;
        $chefarchive->description = $request->input('description');
        if($request->hasfile('fichier'))
        {
            $file = $request->file('fichier');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/archives/', $filename);
            $chefarchive->fichier = $filename;
        }
        $chefarchive->save();
        return redirect()->route('chefarchive')->with('success', 'Ajouter avec succès');
    }
}
