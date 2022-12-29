@extends('layouts.dash')
@section('content')

            <!--Product Start -->
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6 ">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h4 class="mb-4 text-center"> <strong> Liste des Catégories</strong></h4>
                            <form action="{{route('cate.search')}}" method="post">
                                @csrf
                                <input class="form-control" type="search" name="reach" id="reach" placeholder="Rechercher une catégorie" value="">
                                <button class="input-group-text" type="submit"><i class="fas fa-search"></i></button>
                            </form>
                                @if('session()->has(successSuppress)')
                                {{session()->get('successSuppress')}}
                                @endif
                            <div class="col-sm-6 col-xl-3 ">
                            @foreach($categories as $categorie)
                                {{$categorie->nom}} <a href="#" class="btn-btn-primary" onclick="if(confirm('Voulez vous vraiment supprimer cette catégorie?')){document.getElementById('form-{{$categorie->id}}').submit()}"></i>Supprimer</a>
                                <form id="form-{{$categorie->id}}" action="{{route('categorie.supprimer', ['categorie'=>$categorie->id])}}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">
                                </form>
                            @endforeach
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-12 col-xl-6 text-center">
                        <div class="row g-4">
                            <h4> <strong> Liste des Produits </strong></h4>
                          
                                @if('session()->has(successDelete)')
                                {{session()->get('successDelete')}}
                                @endif
                                @if('session()->has(successM)')
                                    {{session()->get('successM')}}
                                @endif
                                @if('session()->has(success)')
                                    {{session()->get('success')}}
                                @endif
                                @foreach ( $produits as $produit )
                            <div class="col-sm-6 col-xl-3">
                                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                    <a href="single-product/{{$produit->id}}"><img src="{{$produit->image}}" alt="Image du produit" style="width:200px; height:200px;"></a>
                                    <div class="ms-3 text-center">
                                        <h3 class="">{{$produit->nom}}</h3> 
                                        <p class="">{{$produit->prix}} XOF</p> 
                                        <p class="">{{$produit->categorie->nom ?? 'Categorie supprimée'}}</p>
                                        <a href="{{route('produit.edit',['produit'=>$produit->id])}}" class="">Modifier</a>
                                        <a href="#" class="btn btn-primary" onclick="if(confirm('Voulez vous vraiment supprimer ce produit?')){document.getElementById('form-{{$produit->id}}').submit()}">Supprimer</a>
                                        <form id="form-{{$produit->id}}" action="{{route('produit.destroy',['produit'=>$produit->id])}}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="delete">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
				<div class="d-flex justify-content-center">{{$produits->links()}} </div>

                    </div>
                </div>
            </div>
        </div>
@section('content')