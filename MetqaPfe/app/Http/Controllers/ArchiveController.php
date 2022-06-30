<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archive;
use Illuminate\Support\Facades\Auth;

class ArchiveController extends Controller
{
    public function index()
    {

            $archive=Archive::all()->sortDesc();
    return view("admin.archive",compact("archive"));
    }


    public function indexxx()
    {

            $archives=Archive::where('iddepartement',Auth::user()->iddepartement)->get();


    return view("ingenieur.archive",compact("archives"));
    }

    public function indexAPI(){
        $url='http://192.168.125.159:8000';
        $archive = Archive::all();
        foreach ($archive as $key => $a) {
            $a->iddepartement=$a->iddepartemente->name;
            $a->fichierSrc = $url."/uploads/archives/".$a->fichier;
        }
        return $archive;

   }

   public function search($fichier)
    {
        $search=Archive::where('description','like','%'.$fichier.'%')->get();
        return $search;
    }

   public function countFichier(){
    $archive=Archive::count();
    return $archive;
}

    public function create()
    {

       return view("admin.archivecreate");
    }
    public function store(Request $request)
    {
        $request->validate([
            'description' => ['required', 'string', 'max:255','unique:archives'],

        ]);
        $archive = new Archive();
        $archive->iddepartement =Auth::user()->iddepartement;
        $archive->description = $request->input('description');
        if($request->hasfile('fichier'))
        {
            $file = $request->file('fichier');
            $extenstion = $file->getClientOriginalExtension();
            $filename = $request->input('description').'.'.$extenstion;
            $file->move('uploads/archives/', $filename);
            $archive->fichier = $filename;
        }
        $archive->save();
        return redirect()->route('toutarchive')->with('success', 'Ajouter avec succès');
    }

    public function create1()
    {
       return view("ingenieur.archivecreate");
    }
    public function store1(Request $request)
    {
        $archive = new Archive();
        $archive->iddepartement =Auth::user()->iddepartement;
        $archive->description = $request->input('description');
        if($request->hasfile('fichier'))
        {
            $file = $request->file('fichier');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/archives/', $filename);
            $archive->fichier = $filename;
        }
        $archive->save();
        return redirect()->route('archiveingenieur')->with('success', 'Ajouter avec succès');
    }

    public function storearchivesAPI(Request $request)
    {
        $archive = new Archive();
        $d=1;
        $archive->iddepartement =$d;
        $archive->description = $request->input('description');
        if($request->hasfile('fichier'))
        {
            $file = $request->file('fichier');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/archives/', $filename);
            $archive->fichier = $filename;
        }
        $archive->save();
        return $archive;
    }

    public function destroy($id)
    {
        Archive::destroy($id);
        return redirect()->route('archive');
    }

    public function destroy1($id)
    {
        Archive::destroy($id);
        return redirect()->route('chefarchive')->with('success', 'Supprimer avec succès');
    }
    public function destroy2($id)
    {
        Archive::destroy($id);
        return redirect()->route('toutarchive')->with('success', 'Supprimer avec succès');
    }

    public function destroy3($id)
    {
        Archive::destroy($id);
        return redirect()->route('archiveingenieur')->with('success', 'Supprimer avec succès');
    }

    public function destroyArchiveAPI($id)
    {
        $archive=Archive::destroy($id);
        return $archive;
    }
}
