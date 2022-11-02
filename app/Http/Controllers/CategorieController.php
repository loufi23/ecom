<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategorieController extends Controller
{
    public function index(){
        $categories = Categorie::orderBy("created_at","desc")->get();
        return view ("createcategorie",compact("categories"));
    }
    public function add(Request $request){
        $request->validate([
            "nom"=>"required"
        ]);
        
        $request = array(
            "nom"=> $request->nom
        );
        Categorie::create($request);
        return Redirect::to('home')->with("success","La catégorie a été ajouté avec succès!");
     }


     public function supprimer(Categorie $categorie){
        $categorie->delete();
        return Redirect::to('home')->with("successSuppress","La catégorie été supprimé !");
    }
    public function reach(Request $request){
        $search=$request['search']?? "" ;
         if ($search != ""){
            $categories=Categorie::where('nom','LIKE',$search)->get();
        }
        else{
            $categories=Categorie::all();
        }
        $data = compact('categories','search');
        return view('reach-view')->with($data);
    }
    
}
