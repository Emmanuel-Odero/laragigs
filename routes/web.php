<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;


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
//Show Register/Create Form
Route::get('/register', [UserController::class, 'create']);
//Create New Users
Route::post('/users',[UserController::class,'store']);
//Log User Out
Route::post('logout', [UserController::class,'logout']);