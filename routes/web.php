<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use Illuminate\Auth\Events\Login;

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

// All listings 
Route::get('/', [ListingController::class, 'index']); 
// show create form 
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');
// store listings 
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');
// Display update form 
Route::get('/listings/{listing}/update', [ListingController::class, 'edit'])->middleware('auth');
// Edit submit to update 
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');
// delete a listing 
Route::delete('/listings/{listing}', [ListingController::class , 'delete'])->middleware('auth');
// display register page 
Route::get('/register', [UserController::class, 'create']);
// store user's data
Route::post('/register', [UserController::class , 'store']);
// logout 
Route::post('/logout', [UserController::class, 'lgout']);
// display login page
Route::get('/login', [UserController::class, 'login'])->name('login');
// login 
Route::post('/login/authenticate',[UserController::class, 'login', 'authenticate']);
// single listings
Route::get('/listings/{listing}', [ListingController::class, 'show']);
