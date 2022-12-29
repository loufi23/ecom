@extends('layouts.adminlay')
   @section('content')
   @section('title','Dashboard | Produits')
    <!-- Contenu de la page -->
    <div class="container-fuid pt-4 px-4">
        <div class="row ">
            <div class="mx-auto"><h6>Tous les produits</h6> </div>
                @if('session()->has(successSuppress)')
                    {{session()->get('successSuppress')}}
                @endif
                @if($errors->any())
                    @foreach($errors->all() as $error)	
                        <li>{{$error}}</li>
                    @endforeach
                @endif
                {{session()->get('success')}}
            <div style="text-align: end;">
                <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fas fa-plus"></i>Ajouter un produit</a>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Ajout d'un produit</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @include('pages.produits.form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid px-4">
        <div class="row g-4">
            <div class="mx-auto text-center">
                @if('session()->has(successDelete)')
                    {{session()->get('successDelete')}}
                @endif
                @if('session()->has(successM)')
                    {{session()->get('successM')}}
                @endif
                @if('session()->has(success)')
                    {{session()->get('success')}}
                @endif
            </div>
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
                                    <th scope="col"></th>
                                    <th scope="col"></th>
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
                                    <td>
                                        <a type="button" style="color:var(--primary)" title="Editer!" data-bs-toggle="modal" data-bs-target="#staticBackdrop1"><i class="fas fa-pen"></i></a>
                                            <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Ajout d'un produit</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @include('pages.produits.form',['produit'=>$produit])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" title="Supprimer!" style="color:var(--danger)"onclick="if(confirm('Voulez vous vraiment supprimer ce produit?')){document.getElementById('form-{{$produit->id}}').submit()}"><i class="fas fa-trash"></i></a>
                                        <form id="form-{{$produit->id}}" action="{{route('produit.destroy',['produit'=>$produit->id])}}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="delete">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">{{$produits->links()}} </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->
        </div>
    </div>
    
@endsection('content')