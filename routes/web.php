<?php

use App\Http\Controllers\ActivationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/activate/{code}', [ActivationController::class, 'activationUserAccount'])->name('user.activate');
Route::get('/resend/{email}', [ActivationController::class, 'resendActivationCode'])->name('code.resend');


Route::resource('products',ProductController::class);
Route::get('products/category/{category?}',[HomeController::class,'getProductByCategory'])->name("category.products");
// cart

Route::get('/cart',[CartController::class,'index'])->name("cart.index");
Route::post('/add/cart/{product}',[CartController::class,'addProductToCart'])->name("add.cart");
Route::put('/update/{product}/cart',[CartController::class,'updateProductOnCart'])->name("update.cart");
Route::delete('/remove/{product}/cart',[CartController::class,'removeProductFromCart'])->name("remove.cart");
