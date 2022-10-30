<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
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
        return back()->with("success","La catégorie a été ajouté avec succès!");
     }


     public function supprimer(Categorie $categorie){
        // dd($id);
        // Categorie::find($id)->delete();
        $categorie->delete();
        return back()->with("successSuppress","La catégorie été supprimé !");
    }
    public function recherche(Request $request){
        $search=$request['search']?? "" ;
         if ($search != ""){
            $categories=Categorie::where('nom','LIKE',$search)->get();
        }
        else{
            $categories=Categorie::all();
        }
        $data = compact('categories','search');
        return view('createcategorie')->with($data);
    }
    
}
