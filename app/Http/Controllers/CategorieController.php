<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategorieController extends Controller
{
    public function index(){
        $categories = Categorie::orderBy("created_at","desc")->get();
        return view ("pages.categories.index",compact("categories"));
    }
    
    public function add(Request $request){
        $request->validate([
            "nom"=>"required"
        ]);
        
        $request = array(
            "nom"=> $request->nom
        );
        Categorie::create($request);
        return Redirect::to('pages.categories.index')->with("success","La catégorie a été ajouté avec succès!");
     }


     public function supprimer(Categorie $categorie){
        $categorie->delete();
        return Redirect::to('pages.categories.index')->with("successSuppress","La catégorie été supprimé !");
    }
    public function reach(Request $request){
        $reach=$request['reach']?? "" ;
         if ($reach != ""){
            $categories=Categorie::where('nom','LIKE',"%$reach%")->get();
        }
        else{
            $categories=Categorie::all();
        }
        $data = compact('categories','reach');
        return view('reach-view')->with($data);
    }

      


}
