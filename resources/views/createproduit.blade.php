@extends('layouts.create')
@section('contenu')
 <!-- title -->
 <title>Ajouter un produit</title>
    <div class="alert alert-succes">	
		<p>{{session()->get('success')}}</p>
	</div>
    <ul>
		@foreach($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
	</ul>
 	<form  method="post" action="{{route('produit.ajouter')}}" enctype="multipart/form-data">
		@csrf
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
                        <label >Choisir une image</label>
                        <input type="file" class="form-control-file" name="image" required>
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3 class="col-md-4 mb-3">
                            <label >Nom du produit</label>
                            <input type="text" name="nom" class="form-control"  placeholder="Produit" required>
                         </h3>
						<p class="col-md-4 mb-3">
                            <label> Prix du produit</label>
                            <input type="number" class="form-control"  placeholder="XOF" name="prix" required>
                        </p>
						<p>
                            <label >Décrivez le produit</label>
                            <input type="text" class="form-control-file" name="details" placeholder="Description"required>
                        </p>
						<div class="single-product-form">
							<p><strong>Catégorie: </strong>
                            <select class="form-control"name="categorie_id" required>
                                @foreach($categories as $categorie)
                                <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                                @endforeach
                            </select>
                            </p>
						</div>
						<button class="cart-btn" type="submit">Enregistrer</button>
						<a href="reset" class="danger-btn">Annuler</a>
					</div>
			    </div>
			</div>
		</div>
	</form>
@endsection('contenu')
