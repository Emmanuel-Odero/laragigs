<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ListingController;
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

Route::get('/index.html', function () {
    return view('welcome');
});
Route::get('/',[ListingController::class,'index']);
Route::get('/listings',[ListingController::class,'index']);
Route::get('/listings/{listing}',[ListingController::class,'show']);

// Common Routes:
// index ---shows all job listings
// show ---show all single listing
// create ---show form to create new liting
// store ---store new listing
// edit ---show form to edit listing
// update ---update listing
// destroy ---Delete listing
