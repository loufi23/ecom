<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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
Route::get('/', [ProduitController::class,"index"]);
Route::get('/createcategorie', [CategorieController::class,"index"]);


//details de produits
Route::get('/single-product/{id}', [ProduitController::class,"details"]);

//produit
Route::get('/home/create', [ProduitController::class,"create"])->name('produit.create');
Route::post('/home/create', [ProduitController::class,"store"])->name('produit.ajouter');
Route::delete('/home/{produit}', [ProduitController::class,"destroy"])->name('produit.destroy');
Route::put('/home/{produit}', [ProduitController::class,"update"])->name('produit.update');
Route::get('/home/{produit}', [ProduitController::class,"edit"])->name('produit.edit');

//categorie
Route::post('/home/new', [CategorieController::class,"add"])->name('categorie.add');
Route::delete('/catego/{categorie}', [CategorieController::class,"supprimer"])->name('categorie.supprimer');

// search
Route::post('/search', [ProduitController::class,"recherche"])->name('categorie.search');
Route::post('/sear', [CategorieController::class,"recherche"])->name('cate.search');

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home', [ProduitController::class,"ListForAdmin"]);
