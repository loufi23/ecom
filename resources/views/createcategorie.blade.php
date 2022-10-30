@extends('layouts.create')
@section('contenu')
<title>Gestion de catégorie</title>
 
<!-- search icon start -->
<ul>
    <li>
	    <div class="header-icons">
			<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
		</div>
	</li>
</ul>
<!-- search icon end -->

<!-- search area -->
<form action="{{route('cate.search')}}" method="post">
	@csrf
		<div class="search-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<span class="close-btn"><i class="fas fa-window-close"></i></span>
						<div class="search-bar">
							<div class="search-bar-tablecell">
								<h3>Vous recherchez:</h3>
								<input type="search" name="search" id="search" placeholder="categorie" value="">
								<button type="submit">Lancez la recherche <i class="fas fa-search"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!-- end search area -->
<div class="container">
	<div class="row">
        <div class="col-md-6">
			<div class="single-product-img">
                <strong>Les catégories déja existantes sont :</strong>
                <div class="col-lg-4">
                    <ul>
                   
                    @foreach($categories as $categorie)
                        <h6>
                        <li> 
                            {{$categorie->nom}} <a href="#" class="cart-btn" onclick="if(confirm('Voulez vous vraiment supprimer cette catégorie?')){document.getElementById('form-{{$categorie->id}}').submit()}"></i>Supprimer</a>
                        </li>
                        </h6>
                        <form id="form-{{$categorie->id}}" action="{{route('categorie.supprimer', ['categorie'=>$categorie->id])}}" method="post">
                        <!-- <form id="form-{{$categorie->id}}" action="/home/{{$categorie->id}}" method="post">    -->
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                        </form>
        
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <h4>Ajouter une nouvelle catégorie</h4>
            </div>
            <div class="alert alert-succes">	
                <p style="color:green ;">{{session()->get('success')}}</p>
            </div>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        	<form  method="post" action="{{route('categorie.add')}}">
                @csrf
                <div>
                    <p><strong>Saisir le nom de la catégorie: </strong>
                        <input type="text" class="form-control-file" name="nom" placeholder="Catégorie"required>
                    </p>
                </div> <br>
                <div>
                    <button class="cart-btn" type="submit">Enregistrer</button>
                    <a href="#" type="reset" class="cart-btn">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection('contenu')