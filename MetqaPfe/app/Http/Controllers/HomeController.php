<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Commande;
use App\Models\Reclamation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        if (Auth::user()->role==1) {
            $users=User::count();
            $archive=Archive::count();
            $userss = User::where('role',2)->count();
            $commande = Commande::where('status',1)->count();
            $commandea = Commande::where('status',1)->count();
            $commander = Commande::where('status',2)->count();
            $commandeec = Commande::where('status',0)->count();
            $reclamationac = Reclamation::where([['iddepartement', '=', '1'],['status', '=', '1']])->count();
            $reclamationre = Reclamation::where([['iddepartement', '=', '1'],['status', '=', '2']])->count();
            $reclamationencourss = Reclamation::where([['iddepartement', '=', '1'],['status', '=', '0']])->count();
            return view('admin.home',compact('users','userss','archive','commande','commandea','commander','commandeec','reclamationencourss','reclamationac','reclamationre'));
        }elseif(Auth::user()->role==2) {
            $commandea = Commande::where('status',1)->count();
            $commander = Commande::where('status',2)->count();
            $commandeec = Commande::where('status',0)->count();
            return view('client.home',compact('commandea','commander','commandeec'));
        }elseif(Auth::user()->role==3) {

            $reclamation=Reclamation::where('email',Auth::user()->email)->count();
            $archive=Archive::where('iddepartement',Auth::user()->iddepartement)->count();
            $r=Reclamation::all();

                $reclamationconfirmer = Reclamation::where('status',1)->count();


            return view('chef.home',compact('archive','reclamationconfirmer','reclamation'));
        }elseif(Auth::user()->role==4) {
            $reclamationconfirmer = Reclamation::where('status',1)->count();
            $reclamation=Reclamation::count();
            $reclamationrefuser = Reclamation::where('status',2)->count();
            $reclamationencours = Reclamation::where('status',0)->count();
            $reclamationac = Reclamation::where('status',1)->count();
            $reclamationre = Reclamation::where('status',2)->count();
            $reclamationencourss = Reclamation::where('status',0)->count();
            return view('ingenieur.home',compact('reclamation','reclamationconfirmer','reclamationrefuser','reclamationencours','reclamationac','reclamationre','reclamationencourss'));
        }


    }




}
