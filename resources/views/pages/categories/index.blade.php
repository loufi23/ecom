@extends('layouts.adminlay')
   @section('content')
   <title>Dashboard | Catégorie</title>
    <!-- Contenu de la page -->
    <div class="container-fuid pt-4 px-4">
        <div class="row ">
            <div class="mx-auto py-2"><h6>Toutes les catégories</h6> </div>
            <div class="py-2" style="text-align: end;">
                <a type="button" class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#staticBackdrop"> <i class="fas fa-plus" style="margin-right:5px;"></i>Ajouter </a>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Ajout de Catégorie</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        @include('pages.categories.form')
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="bg-light rounded h-100 p-4">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Nombre de produits</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $categorie)
                            <tr>
                                <th scope="row">{{$categorie->id}}</th>
                                <td>{{$categorie->nom}}</td>
                                <td >Nombre</td>
                                <td><a href="#"title="Editer!"><i class="fas fa-pen"></i></a> </td>
                                <td>
                                    <a href="#" style="color:var(--danger)" title="Supprimer" onclick="if(confirm('Voulez vous vraiment supprimer cette catégorie?')){document.getElementById('form-{{$rubrique->id}}').submit()}"> <i class="fas fa-trash"></i></a>
                                    <form id="form-{{$categorie->id}}" action="{{route('categorie.supprimer', ['categorie'=>$categorie->id])}}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="delete">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>  
        </div>
    </div>
@endsection('content')