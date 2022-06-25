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
// create ---show create form to create new liting
Route::get('/listings/create',[ListingController::class,'create']);
// store ---store listing data
Route::post('/listings',[ListingController::class,'store']);
// edit ---Show edit listing Form
Route::get('/listings/{listing}/edit',[ListingController::class,'edit']);
// update ---update Edited listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);
// Delete ---Delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'delete']);
// show ---show single listing
Route::get('/listings/{listing}',[ListingController::class,'show']);