@extends('layouts.dash')
@section('content')
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="/" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Bio-Shop</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                        <span>Administrateur</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="home" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="form" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>liste des Produits</a>
                    <a href="table" class="nav-item nav-link"><i class="fa fa-table me-2"></i>liste des Catégories</a>
                    <a href="table" class="nav-item nav-link"><i class="fa fa-table me-2"></i>liste des Catégories</a>

                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
               <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">                    
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="table" class="dropdown-item">Mon profil</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ __('Deconnexion') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!--Product Start -->
            <div class="container-fluid pt-4 px-4">
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
    </div>
@section('content')