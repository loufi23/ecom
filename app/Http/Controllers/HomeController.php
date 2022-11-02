<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
        $produits = Produit::orderBy("created_at","desc")->paginate(10);
        $categories = Categorie::orderBy("created_at","desc")->get();
        return view ("home",compact('produits','categories'));
    }
    public function index1()
    {
        $categories = Categorie::all();
        $produits = Produit::all();
       return view ("form",compact('produits','categories'));
    }
    public function index2()
    {
        $users = User::all();
        return view ("table",compact('users'));
    }
    public function modifyUser(Request $request, User $user)
    {
        $request->validate([
            "name"=>"required",
            "email"=>"required",
            "password"=>"required"
        ]);
        $user->update([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>$request->password

        ]);    
        return Redirect::to('table')->with("successU","Le profil a été modifié avec succès!");
    }
    
}
