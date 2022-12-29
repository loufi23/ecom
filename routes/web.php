<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

*/

Route::get('/single-prooduct', function () {
    return view('single-product');
});

Route::get('/welcom', function () {
    return view('welcom');
});

Route::get('/', [ProduitController::class,"index"]);


//details de produits
Route::get('/single-product/{id}', [ProduitController::class,"details"]);

//produit
Route::post('/produits-view/create', [ProduitController::class,"store"])->name('produit.ajouter');
Route::delete('/produits-view/{produit}', [ProduitController::class,"destroy"])->name('produit.destroy');
Route::patch('/produits-view/{produit}', [ProduitController::class,"update"])->name('produit.update');
// Route::get('/produits-view/{produit}', [ProduitController::class,"edit"])->name('produit.edit');
Route::post('/search', [ProduitController::class,"recherche"])->name('produits.search');
Route::post('/recherche', [ProduitController::class, 'rechercheAdmin'])->name('recherche');



// user
Route::put('/users/{user}', [UserController::class,"modifyUser"])->name('user.update');


//categorie
Route::post('/categories/new', [CategorieController::class,"add"])->name('categorie.add');
Route::delete('/categories/{categorie}', [CategorieController::class,"supprimer"])->name('categorie.supprimer');
Route::post('/sear', [CategorieController::class,"reach"])->name('cate.search');


// search

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth']],function(){
    Route::get('/produits-view', [ProduitController::class, 'listforadmin'])->name('produits-view');
    Route::get('/categories-view', [CategorieController::class, 'index'])->name('categories-view');
    Route::get('/users-view', [UserController::class, 'index'])->name('users-view');
    Route::get('/monprofil', [UserController::class, 'monprofil'])->name('monprofil');
    
});