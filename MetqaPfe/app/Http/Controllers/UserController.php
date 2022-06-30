<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role != 1) {
            return redirect()->route('login');
        }
       $users =User::all()->sortDesc();

       return view("users.index",compact("users"));
    }

    public function index1()
    {
        if (Auth::user()->role != 1) {
            return redirect()->route('login');
        }
       $users =User::all()->sortDesc();
       return view("admin.client",compact("users"));
    }

    public function indexAPI(){
        $users = User::all()->sortDesc();
        foreach ($users as $i => $user) {
            $user->role = $user->rolee->name;
            $user->iddepartement = $user->iddepartementee;
        }

        return $users;

   }

   public function search($nom)
    {
        $search=User::where('name','like','%'.$nom.'%')->get();
        return $search;
    }


   public function countUsers(){
    $users=User::count();
    return $users;
}
public function countClient(){
    $userss = User::where('role',2)->count();
    return $userss;
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $roles=Role::all();
       $departements=Departement::all();
       return view("users.create",compact("roles","departements"));



    }

    public function createRolesAPI()
    {
       $roles=Role::all();

       return $roles;


    }

    public function createDepartementsAPI()
    {
       $departements=Departement::all();

       return $departements;


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8',],
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password) ;
        $user->role = $request->role;
        $user->iddepartement = $request->iddepartement;
        $user->save();
        return redirect()->route('users.index')->with('success', 'Ajoute avec succès');
    }

    public function storeUsresAPI(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8',],
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password) ;
        $user->role = $request->role;
        $user->iddepartement = $request->iddepartement;
        $user->save();
        return $user;
    }

    public function storeClientAPI(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8',],
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password) ;
        $user->save();
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles=Role::all();
        $user=User::find($id);
        return view("users.edit",compact("user","roles"));
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


        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password) ;
        }else {
            $user->password = $user->password ;
        }

        $user->role = $request->role;

        $user->save();
        return redirect()->route('users.index');
    }


    public function updateUser(Request $request,$id)
    {
        $users=User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        if ($request->password) {
            $users->password = Hash::make($request->password) ;
        }else {
            $users->password = $users->password ;
        }
        $users->role = $request->role;
        $users->iddepartement = $request->iddepartement;

        $users->save();
        return $users;

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('users.index')->with('success', 'Supprimer avec succès');
    }

    public function destroyUsersAPI($id)
    {
        $delete=User::destroy($id);
        return $delete;
    }


}
