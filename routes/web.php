<?php

use App\Models\Review;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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
    $reviews = Review::all();
    return view('home', ['reviews' => $reviews]);   
});

//Routes for User

Route::post('/Register',[UserController::class, 'register']);
Route::post('/Logout',[UserController::class, 'logout']);
Route::post('/Login',[UserController::class, 'login']);

//Routes for Reviews

// Route::post('/create-review',[ReviewController::class,'createReview']);
// Route::get('/edit-review/{review}',[ReviewController::class,'ShowEditScreen']);
// Route::put('/edit-review/{review}',[ReviewController::class,'UpdatedReview']);
// Route::delete('/delete-review/{review}',[ReviewController::class,'DeleteReview']);

//Routes for Admin


Route::get('/admin', function () {
    return view('admin');   
});

Route::post('/AdminLogin',[AdminController::class, 'adminlogin']);