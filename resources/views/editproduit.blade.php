@extends('layouts.create')
@section('contenu')
 <!-- title -->
 <title>Modifier un produit</title>
    <div class="alert alert-succes">	
		<p>{{session()->get('success')}}</p>
	</div>
    <ul>
		@foreach($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
	</ul>
 	<form  method="post" action="{{route('produit.update',['produit'=>$produit->id])}}" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="_method" value="put">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
                        <label >Choisir une image</label>
                        <input type="file" class="form-control-file" name="image" required value="{{$produit->image}}">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3 class="col-md-6 mb-3">
                            <label >Nom du produit</label>
                            <input type="text" name="nom" class="form-control"  value="{{$produit->nom}}" required>
                         </h3>
						<p class="col-md-4 mb-3">
                            <label> Prix du produit</label>
                            <input type="number" name="prix" class="form-control" value="{{$produit->prix}}" required>
                        </p>
						<p class="col-md-4 mb-6">
                            <label >Décrivez le produit</label>
                            <input type="text" class="form-control-file" name="details" value="{{$produit->details}}"required>
                        </p>
						<div class="single-product-form">
							<p class="col-md-4 mb-3"><strong>Catégorie: </strong>
                            <select class="form-control"name="categorie_id" required>
                                @foreach($categories as $categorie)
									@if($categorie->id== $produit->categorie_id)
										<option value="{{$categorie->id}}" selected>{{$categorie->nom}}</option>
									@else
										<option value="{{$categorie->id}}">{{$categorie->nom}}</option>
									@endif
                                @endforeach
                            </select>
                            </p>
						</div>
						<button class="cart-btn" type="submit">Modifier</button>
						<a href="reset" class="cart-btn">Annuler</a>
					</div>
			    </div>
			</div>
		</div>
	</form>
@endsection('contenu')
