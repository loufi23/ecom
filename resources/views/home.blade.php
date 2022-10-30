@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card-body">
		<div class="">
			<a href="{{route('produit.create')}}" class="cart-btn"><i class=""></i>Ajouter Produit</a>
			<a href="createcategorie" class="cart-btn"><i class=""></i>Gestion de Catégorie</a>
		</div>
    </div>
    @if('session()->has(successSuppress)')
        <div class="alert alert-succes">	
            <p>{{session()->get('successSuppress')}}</p>
        </div>
     @endif
</div>

<div class="row">
	 @foreach ( $produits as $produit )
	<div class="col-lg-4 col-md-6 text-center">
		<div class="single-product-item">
			<div class="product-image">
				<a href="single-product/{{$produit->id}}"><img src="{{$produit->image}}" alt=""></a>
			</div>
			<h3>{{$produit->nom}}</h3>
			<p class="product-price"><span>Par Kg</span>{{$produit->prix}} XOF</p>
			<p class=""><span></span>{{$produit->categorie->nom}}</p>
			<a href="{{route('produit.edit',['produit'=>$produit->id])}}" class="cart-btn"><i class=""></i>Modifier</a>
			<a href="#" class="danger-btn" onclick="if(confirm('Voulez vous vraiment supprimer ce produit?')){document.getElementById('form-{{$produit->id}}').submit()}"><i class=""></i>Supprimer</a>
            
            <form id="form-{{$produit->id}}" action="{{route('produit.destroy',['produit'=>$produit->id])}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="delete">
           </form>
        
        </div>
	</div>
	@endforeach

@endsection
