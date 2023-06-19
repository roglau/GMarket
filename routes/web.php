<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class,'home']);
Route::get('detail/{id}', [GameController::class,'detail']);

Route::get('login',[AuthController::class,'loginPage'])->name('login');
Route::post('login',[AuthController::class,'login']);
Route::get('logout',[AuthController::class,'logout']);

Route::get('register',[AuthController::class,'regisPage']);
Route::post('register',[AuthController::class,'regis']);

Route::get('forum',[ForumController::class,'forum']);

Route::group(['middleware' => 'auth'],function(){
    Route::get('/profile',[UserController::class,'profile']);
    Route::post('/updateprofile',[UserController::class,'updateProfile']);
    Route::post('/updateaccount',[UserController::class,'updateAccount']);

    Route::get('/cart',[CartController::class,'cart']);
    Route::get('/addcart/{id}', [CartController::class,'addCart']);
    Route::post('/updatecart/{id}', [CartController::class,'updateCart']);
    Route::get('/deletecart/{id}', [CartController::class,'deleteCart']);
    Route::get('/checkout', [TransactionController::class,'checkoutPage']);
    Route::get('/process', [TransactionController::class,'checkout']);
    Route::get('/transaction', [TransactionController::class,'transaction']);
    Route::get('/transactiondetail/{id}', [TransactionController::class,'transactionDetail']);

    Route::get('/managegame',[GameController::class,'managegame'])->middleware('admin')->name('managegame');
    Route::get('/managegenre',[GameController::class,'managegenre'])->middleware('admin')->name('managegenre');

    Route::get('/insertgame',[GameController::class,'insert'])->middleware('admin');
    Route::post('/insertgame',[GameController::class,'insertGame'])->middleware('admin');
    Route::get('/updategame/{id}',[GameController::class,'update'])->middleware('admin');
    Route::post('/updategame/{id}',[GameController::class,'updateGame'])->middleware('admin');
    Route::get('/deletegame/{id}',[GameController::class,'deleteGame'])->middleware('admin');

    Route::get('/updategenre/{id}',[GameController::class,'updateGenrePage'])->middleware('admin');
    Route::post('/updategenre/{id}',[GameController::class,'updateGenre'])->middleware('admin');
});
