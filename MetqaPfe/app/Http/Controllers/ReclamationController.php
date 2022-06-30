<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReclamationController extends Controller
{
    public function simple(Request $request)
    {
        $reclamations = DB::table('Reclamations');
        if( $request->input('search')){

            $reclamations = $reclamations->where($request->searchby, 'LIKE', "%" . $request->search . "%");
        }
        $reclamations = $reclamations->paginate(10);
        return view('ingenieur.search', compact('reclamations'));
    }

    public function index7()
    {
        if (Auth::user()->role != 3) {
            return redirect()->route('login');
        }
        $reclamatione =Reclamation::all()->sortDesc();
    return view("chef.reclamation",compact("reclamatione"));
    }

    public function index2()
    {
        if (Auth::user()->role != 1) {
            return redirect()->route('login');
        }
        $reclamations =Reclamation::all()->sortDesc();
    return view("admin.reclamation",compact("reclamations"));
    }

    public function index1()
    {
        if (Auth::user()->role != 4) {
            return redirect()->route('login');
        }
        $reclamations =Reclamation::all()->sortDesc();

    return view("ingenieur.consultereclamation",compact("reclamations"));
    }

    public function index3()
    {
        if (Auth::user()->role != 4) {
            return redirect()->route('login');
        }
        $reclamations =Reclamation::all()->sortDesc();

    return view("ingenieur.reclamationconfirmer",compact("reclamations"));
    }

    public function index4()
    {
        if (Auth::user()->role != 4) {
            return redirect()->route('login');
        }
        $reclamations =Reclamation::all()->sortDesc();

    return view("ingenieur.reclamationrefuser",compact("reclamations"));
    }

    public function index5()
    {
        if (Auth::user()->role != 4) {
            return redirect()->route('login');
        }
        $reclamations =Reclamation::all()->sortDesc();

    return view("ingenieur.reclamationencours",compact("reclamations"));
    }



    public function indexAPI()
    {
        $reclamations =Reclamation::all()->sortDesc();
        foreach ($reclamations as $i => $a) {
            $a->iddepartement = $a->iddepartemente->name;
            $a->matrielAReparer = json_decode($a->matrielAReparer);
            $a->problems = json_decode($a->problems);
            $a->Autres = json_decode($a->Autres);

    }

    return $reclamations;
    }

    public function show1($id)
    {
        $reclamation = Reclamation::find($id);
        return view('chef.reclamationshow',compact('reclamation'));
    }

    public function create()
    {

        $reclamations=Reclamation::all();
        return view("chef.reclamationcreate",compact("reclamations"));
    }

    public function create1()
    {
        $reclamations=Reclamation::all();
        return view("admin.reclamationcreate",compact("reclamations"));

    }

    public function show($id)
    {
        $reclamation = Reclamation::find($id);

        return view('ingenieur.reclamationshow',compact('reclamation'));
    }

    public function show3()
    {
        $reclamations=Reclamation::all();
        return $reclamations;
    }

    public function showReclaAdmin($id)
    {
        $reclamation = Reclamation::find($id);
        return view('admin.reclamationshow',compact('reclamation'));
    }

    public function store(Request $request)
    {
        $reclamation = new Reclamation();
        $reclamation->iddepartement =Auth::user()->iddepartement;
        $reclamation->nom = $request->nom;
        $reclamation->email = $request->email;
        $reclamation->matrielAReparer = json_encode($request->matriel);
        $reclamation->problems = json_encode($request->problems);
        $reclamation->details = $request->matrieldetails;
        $reclamation->Autres = json_encode($request->Autres);
        $reclamation->autresdetails = $request->autresdetails;
        $reclamation->plusdetails = $request->plusdetails;
        $reclamation->save();
        return redirect()->route('reclamation');
    }

    public function store1(Request $request)
    {
        //
        $reclamation = new Reclamation();

        $reclamation->iddepartement =Auth::user()->iddepartement;
        $reclamation->nom = $request->nom;
        $reclamation->email = $request->email;
        $reclamation->matrielAReparer = json_encode($request->matriel);
        $reclamation->problems = json_encode($request->problems);
        $reclamation->details = $request->matrieldetails;
        $reclamation->Autres = json_encode($request->Autres);
        $reclamation->autresdetails = $request->autresdetails;
        $reclamation->plusdetails = $request->plusdetails;

//dd(($reclamation->matrielAReparer)||($reclamation->problems)||($reclamation->Autres)==null);
        //if(||(($reclamation->details)||($reclamation->autresdetails)||($reclamation->plusdetails)!=null)){
         $reclamation->save();
        return redirect()->route('reclamatio')->with('success', 'Ajouter avec succès');

    //}else{

       // return redirect()->route('recl')->with('field', 'select au moins un checkbox');

    }
    public function storeAPI(Request $request)
    {
        $reclamation = new Reclamation();
        $reclamation->iddepartement =$request->iddepartement;
        $reclamation->nom = $request->nom;
        $reclamation->email = $request->email;
        $reclamation->matrielAReparer = json_encode($request->matriel);
        $reclamation->problems = json_encode($request->problems);
        $reclamation->details = $request->matrieldetails;
        $reclamation->Autres = json_encode($request->Autres);
        $reclamation->autresdetails = $request->autresdetails;
        $reclamation->plusdetails = $request->plusdetails;
        $reclamation->save();
        return $reclamation;
    }


    public function confirmer(Request $request, $id)
    {

        $reclamations = Reclamation::find($id);
        $h=1;
        $reclamations->status = $h;
        $reclamations->save();
        return redirect()->route('conreclamation')->with('success', 'Confirmer avec succès');
    }

    public function refuser(Request $request, $id)
    {

        $reclamations = Reclamation::find($id);
        $h=2;
        $reclamations->status = $h;

        $reclamations->save();
        return redirect()->route('conreclamation')->with('success', 'Le reclamation refusè');
    }

    public function edit($id)
    {
        $reclamation =Reclamation::all();
        $reclamation=Reclamation::find($id);
        return view("chef.reclamationedit",compact("reclamation"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function confirmerreclamationAPI(Request $request,$id)
    {
        $reclamations=Reclamation::find($id);

        $reclamations->status = $request->status;

        $reclamations->save();
        return $reclamations;

    }

    public function refuserreclamationAPI(Request $request,$id)
    {
        $reclamations=Reclamation::find($id);

        $reclamations->status = $request->status;

        $reclamations->save();
        return $reclamations;

    }

    public function destroy($id)
    {
        Reclamation::destroy($id);
        return redirect()->route('reclamatio')->with('success', 'Supprimer avec succès');;
    }

    public function destroy2($id)
    {
        Reclamation::destroy($id);
        return redirect()->route('reclamation');
    }

    public function destroyAPI($id)
    {
        $reclamation=Reclamation::destroy($id);
        return $reclamation;
    }
}
