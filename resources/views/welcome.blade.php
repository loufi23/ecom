<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bio-Shop</title>


    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
	  <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="../css/main.css">

  </head>
  <body>
   
    {{-- my header  --}}
	  <header class="">
      {{-- navbar  --}}
      <nav class="navbar navbar-expand-lg position-fixed shadow-sm w-100" id="navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Bio-Shop</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item form-control border-0 d-none d-md-flex mb-0">
                <form class="" action="{{route('produits.search')}}" method="post">
                  @csrf
                  <input class="" type="search" name="search" id="search" placeholder="produit" value="">
                  <button type="submit" style=" padding-top: 7px;margin-left: 5px;"><i class="fas fa-search"></i></button>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      {{-- end navbar  --}}
      {{-- carousel start  --}}
      <div class="slider">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active ">
              <img src="../images/hero-bg.jpg" style="opacity:0.6;" class="d-block w-100">
              <div class="img-text text-center">
                <p class="subtitle">Frais & Bio </p>
                <h1>Des produits bio de notre terroir !</h1>
              </div>
            </div>
            <div class="carousel-item">
              <img src="../images/hero-bg-2.jpg" style="opacity:0.8;" class="d-block w-100">
            </div>
            <div class="carousel-item">
              <img src="../images/feature-bg.jpg" style="opacity:0.8;" class="d-block w-100">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      {{-- carousel end  --}}
      {{-- support --}}
      <div class="list-section pt-80 pb-80">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
              <div class="list-box d-flex align-items-center">
                <div class="list-icon">
                  <i class="fas fa-shipping-fast"></i>
                </div>
                <div class="content">
                  <h3>LIvraison disponible</h3>
                  <p>Dans tout le Burkina Faso</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
              <div class="list-box d-flex align-items-center">
                <div class="list-icon">
                  <i class="fas fa-phone-volume"></i>
                </div>
                <div class="content">
                  <h3>Disponible 24h/7j</h3>
                  <p>Faites vos courses quand vous le voulez !</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="list-box d-flex justify-content-start align-items-center">
                <div class="list-icon">
                  <i class="fas fa-sync"></i>
                </div>
                <div class="content">
                  <h3>Renvoi disponible</h3>
                  <p>ce n'est pas votre commande?  Pas de panique !</p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    </header>
    {{-- my header end  --}}
    {{-- header text  --}}

    <div class="header-text pt-4">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 offset-sm-2 text-center ">
            <p >Frais & Bio </p>
            <h1>Des produits bio de notre terroir !</h1>
          </div>
        </div>
      </div>
    </div>
    {{-- header text end  --}}
    <section class="content-body">
      <div class="container">
        <div class="row">
          <div class="col-md-6 offset-md-3 text-center">
            <h3 class="text-color-coral">Nos Produits bio</h3>
            <hr style="text-align: center; width:20px; border:2px black;">
						<p>Découvrez notre large gamme de produits bio 100% burkinabè </p>
          </div>
        </div>
        <div class="row pt-4">
          @foreach ($produits as $produit)
            <div class="col-md-4 p-3">
              <div class="card pt-2 text-center shadow-lg">
                <div class="card-img">
                  <a href="single-product/{{$produit->id}}">
                    <img src="{{$produit->image}}" alt="" style="width: 250px;height:200px;">
                  </a>
                </div>
                <div class="card-body">
                  <h5 class="card-title ">{{$produit->nom}}</h5>
                  <h6 class="card-text"> {{$produit->categorie->nom}}</h6>
                  <p class="card-text">{{$produit->prix}} <span>FCFA</span></p>
                  <a href="#" class="cart-btn"><i class="fas fa-shopping-cart"></i>Acheter</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
				<div class="d-flex justify-content-center">{{$produits->links()}} </div>
      </div>
    </section>
    <footer class="pt-2">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 text-left">
            <p>Copyrights &copy; 2022 -Olga KALONGA,  Tous droits réservés. </p>
          </div>
          <div class="col-sm-6 text-right links">
            <ul>
              <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
              <li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script>
      window.addEventListener("scroll", function() {
        var nav = document.querySelector("nav");
        nav.classList.toggle("sticky",window.scrollY > 480);
      })
    </script>
  </body>
</html>