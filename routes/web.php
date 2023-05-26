<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//All listing
Route::get('/', [ListingController::class, 'index']);

//Show create form 
Route::get('/listings/create', [ListingController::class, 'create']);


//Store-Add listing data
Route::post('/listings', [ListingController::class, 'store']);

//Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

//Update Data
Route::put('/listings/{listing}', [ListingController::class, 'update']);

//Show Delete Form
Route::get('/listings/{listing}/delete', [ListingController::class, 'delete']);

//Destroy/Delete Data
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);


//Single Listings
Route::get('/listings/{listing}', [ListingController::class, 'show']);