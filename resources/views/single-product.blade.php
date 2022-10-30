@extends('layouts.create')
@section('contenu')
 <!-- title -->
 <title>Détails du produit</title>
	<!-- single product -->
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="{{$produit->image}}" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3>{{$produit->nom}}</h3>
						<p class="single-product-pricing"><span>{{$produit->prix}} XOF</span></p>
						<p>{{$produit->details}}</p>
						<div class="single-product-form">
							<a href="#" class="cart-btn"><i class="fas fa-shopping-cart"></i> Acheter </a>
							<p><strong>Catégorie: </strong>{{$produit->categorie->nom}}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!-- end single product -->
	@endsection('contenu')
