<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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
Route::get('/listings/create', [ListingController::class, 'create']);
// store listings 
Route::post('/listings', [ListingController::class, 'store']);
// Display update form 
Route::get('/listings/{listing}/update', [ListingController::class, 'edit']);
// Edit submit to update 
Route::put('/listings/{listing}', [ListingController::class, 'update']);
// delete a listing 
Route::delete('/listings/{listing}', [ListingController::class , 'delete']);
// display register page 
Route::get('/register', [UserController::class, 'create']);
// store user's data
Route::post('/register', [UserController::class , 'store']);
// logout 
Route::post('/logout', [UserController::class, 'lgout']);
// single listings
Route::get('/listings/{listing}', [ListingController::class, 'show']);
