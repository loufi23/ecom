@extends('layouts.create')
@section('contenu')
 <!-- title -->
 <title>Détails du produit</title>
	<!-- single product -->
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="{{$produit->image}}" style="width:300px; height:300px;">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3>{{$produit->nom}}</h3>
						<p class="single-product-pricing"><span>{{$produit->prix}} XOF</span></p>
						<p>{{$produit->details}}</p>
						<p><strong>Catégorie: </strong>{{$produit->categorie->nom ?? 'Categorie supprimée'}}</p>
						<div class="single-product-form">
							<a href="#" class="cart-btn"><i class="fas fa-shopping-cart"></i> Acheter </a>
							<a href="/" class="danger-btn">Retour </a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!-- end single product -->
	@endsection('contenu')
