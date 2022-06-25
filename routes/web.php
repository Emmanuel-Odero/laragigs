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
Route::get('/listings/create',[ListingController::class,'create'])
->middleware('auth');
// store ---store listing data
Route::post('/listings',[ListingController::class,'store'])
->middleware('auth');;
// edit ---Show edit listing Form
Route::get('/listings/{listing}/edit',[ListingController::class,'edit'])
->middleware('auth');;
// update ---update Edited listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])
->middleware('auth');;
// Delete ---Delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'delete'])
->middleware('auth');;
// show ---show single listing
Route::get('/listings/{listing}',[ListingController::class,'show']);
//Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])
->middleware('guest');;
//Create New Users
Route::post('/users',[UserController::class,'store']);
//Log User Out
Route::post('logout', [UserController::class,'logout'])
->middleware('auth');;
//show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')
->middleware('guest');;
//Log In User ~submitting the login details
Route::post('/users/authenticate', [UserController::class, 'authenticate']);