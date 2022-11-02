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
                    <a href="home" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="form" class="nav-item nav-link "><i class="fa fa-keyboard me-2"></i>Gestion</a>
                    <a href="table" class="nav-item nav-link active"><i class="fa fa-table me-2"></i>Utilisateurs</a>
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
                            <a href="#" class="dropdown-item">Mon profil</a>
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


            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Liste des Administrateurs</h6>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                </thead>
                                @foreach($users as $user)
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{$user->id}}</th>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Modifier mon profil </h6>
                            <div class="table-responsive">
                                @if('session()->has(successSuppress)')
                                    <p  class="alert alert-succes">{{session()->get('successSuppress')}}</p>
                                @endif
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                                <form  method="post" action="{{route('user.update',['user'=>Auth::user()])}}" enctype="multipart/form-data">
                                    @csrf
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Mot de Passe</th>
                                            </tr>
                                        </thead>
                                        <input type="hidden" name="_method" value="put">
                                            <tbody>
                                                <tr>
                                                    <th scope="col">{{Auth::user()->id}}</th>
                                                    <th scope="col"> 
                                                        <input type="text" name="name" class="form-control"  value="{{Auth::user()->name}}" required>
                                                    </th>
                                                    <th scope="col"> 
                                                        <input type="email" name="email" class="form-control"  value="{{Auth::user()->email}}" required>
                                                    </th>
                                                    <th scope="col">
                                                        <input type="text" name="password" class="form-control"  value="{{Auth::user()->password}}" required>
                                                    </th>
                                                <tr>
                                            </tbody>
                                    </table>
                                    <button class="cart-btn" type="submit">Modifier</button>
                                        <a href="reset" class="cart-btn">Annuler</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->


@endsection('content')