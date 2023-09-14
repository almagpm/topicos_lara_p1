<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('e-commerce.index');
});
Route::get('/product-list/{category_id?}', [SiteController::class, 'product'])->name("product_list");
Route::get('/productByCat', [SiteController::class, 'productsByCategory'])->name("productsByCat");
// Ruta para mostrar el formulario de contacto (GET)
Route::get('/contact', [SiteController::class, 'contact'])->name("contact");

Route::get('/detalle/{id?}', [SiteController::class, 'detalle'])->name("detalle");

// Ruta para procesar el formulario de reseñas (POST)
Route::post('/guardar_review', [SiteController::class, 'guardarReview'])->name('guardar_review');

// Ruta para procesar el formulario de contacto (POST)
Route::post('/contact', [SiteController::class, 'contact'])->name("contact_post");








/*
Route::get('/services', [SiteController::class, 'services']);
Route::get('/contact', [SiteController::class, 'contact']);
Route::get('/faq', [SiteController::class, 'faq']);
Route::get('/products', [SiteController::class, 'products']);
Route::get('/about', [SiteController::class, 'about']);


Route::get('/product-list', function () {
    return view('e-commerce.product-list');
});
*/



