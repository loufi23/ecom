@extends('layouts.adminlay')
@section('content')
  @section('title','Dashboard | Utilisateurs')

<!-- content Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="mx-auto py-2 "><h6>Liste des Administrateurs</h6> </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100">
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
                </div>
            </div>
<!-- content end  -->
@endsection('content')