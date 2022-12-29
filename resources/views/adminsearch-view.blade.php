@extends('layouts.adminlay')
@section('content')
    @section('title','Dashboard | Produits')
    <div class="container-fuid pt-4 px-4">
        <div class="row ">
            <div class="mx-auto py-2"><h6>Liste de recherche pour "{{$mot}} "</h6> </div>
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Catégorie</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Image</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ( $produits as $produit )
                                <tr>
                                    <th >{{$produit->id}}</th>
                                    <td>{{$produit->nom}}</td>
                                    <td>{{$produit->categorie->nom ?? 'Categorie supprimée'}}</td>
                                    <td>{{$produit->details}}</td>
                                    <td>{{$produit->prix}} XOF</td>
                                    <td><img src="{{$produit->image}}" style="height:40px; width:40px;"></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Table End -->
            <a href="/produits-view" class="danger-btn align-self-center">Retour</a>
        </div>
    </div>
@endsection('content')