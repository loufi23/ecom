<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use phpDocumentor\Reflection\DocBlock\Tag;

class ProduitController extends Controller
{
    public function index(){
        
        $produits = Produit::orderBy("created_at","desc")->paginate(12);
        
       return view ("welcome",compact("produits"));
    }
    public function listforadmin()
    {
        $produits = Produit::orderBy("created_at","desc")->paginate(10);
        $categories = Categorie::all();
        $produit= new Produit();
        return view ("pages.produits.index",compact('produits','categories','produit'));
    }


    public function details($id){
        $produit= Produit::find($id);
        
        $expl = explode('uploads', $produit->image);
        if (count($expl) > 1) {
            $produit->image =  '../'.$produit->image;
        }
        return view ("single-product", ['produit' => $produit] );
    }
  

    public function store(Request $request)
    {
        $request->validate([
            "nom"=>"required",
            "prix"=>"required",
            "details"=>"required",
            "image"=>"required|image|mimes:jpeg,png,jpg",
            "categorie_id"=>"required"
        ]);
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/', $filename);
            $request->image = $filename;
        }

        $produit = array(
            "nom"=> $request->nom,
            "prix"=> $request->prix,
            "details"=> $request->details,
            "image"=> "uploads/$filename",
            "categorie_id"=> $request->categorie_id
        );
        Produit::create($produit);
        return Redirect::to('pages.produits.index')->with("success","Le produit a été ajouté avec succès!");
    }


    public function destroy(Produit $produit){
        $produit->delete();
        return Redirect::to('pages.produits.index')->with("successDelete","Le produit a été supprimé !");
    }


    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            "nom"=>"required",
            "prix"=>"required",
            "details"=>"required",
            "image"=>"required|image|mimes:jpeg,png,jpg",
            "categorie_id"=>"required"
        ]);
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/', $filename);
            $request->image = $filename;
        }

        $produit->update([
            "nom"=>$request->nom,
            "prix"=>$request->prix,
            "details"=>$request->details,
            "image"=>"uploads/$filename",
            "categorie_id"=>$request->categorie_id

        ]);        
        return Redirect::to('pages.produits.index')->with("successM","Le produit a été modifié avec succès!");
    }
    public function recherche(Request $request){
        $search=$request['search']?? "" ;
         if ($search != ""){
            $produits=Produit::where('nom','LIKE',"%$search%")->paginate(10);  
        }
        else{
            $produits=Produit::all();
        }
        $data = compact('produits','search');
        return view('search-view')->with($data);
    }
    public function rechercheAdmin(Request $request){
        $mot=$request['mot'] ?? "" ;
        // $data=DB::table('produits')->get();
    

         if ($mot != ""){
            
             $produits = Produit::where('nom','LIKE',"%$mot%")
             ->where('produits->categorie->nom','LIKE',"%$mot%")->paginate(10) ;
           
        }
        else{
            $produits=Produit::all();
        }
        $data = compact('produits','mot');
        return view('adminsearch-view')->with($data);
    }


}