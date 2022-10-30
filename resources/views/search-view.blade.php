	@extends('layouts.create')
    @section('contenu')
    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

	<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Liste</span> de recherche pour "{{$search}}" </h3>
					</div>
				</div>
			</div>

			<div class="row">
				@foreach($produits as $produit)
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product/{{$produit->id}}"><img src="{{$produit->image}}" alt=""></a>
						</div>
						<h3>{{$produit->nom}}</h3>
						<p class="product-price">{{$produit->prix}} XOF</p>
						<p class="#">{{$produit->categorie->nom}}</p>
						<a href="#" class="cart-btn"><i class="fas fa-shopping-cart"></i> Acheter !</a>
					</div>
				</div>
				@endforeach
	            {{$produits->links()}}
				</div>
			</div>
		</div>
	</div>
	<!-- end product section -->
@endsection('contenu')