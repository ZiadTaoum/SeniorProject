<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LostitemController;
use App\Http\Controllers\FounditemController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FounditemDescriptionController;

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
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/report', [ReportController::class, 'index'])->name('report');
Route::resource('reviews',ReviewController::class);
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
// Route::get('/images', [ImageController::class, 'index']);

//Routes for User

// Route::post('/Register',[UserController::class, 'register']);
// Route::post('/Logout',[UserController::class, 'logout']);
// Route::post('/Login',[UserController::class, 'login']);

Route::resource('founditem',FounditemController::class);
Route::resource('founditemdescription',FounditemDescriptionController::class);


Route::resource('lostitem',LostitemController::class);

//routes for buttons in homepage
Route::get('/search', [HomeController::class, 'search']);
Route::get('/report-found-item', [HomeController::class, 'reportFoundItem']);
Route::get('/report-lost-item', [HomeController::class, 'reportLostItem']);
Route::get('/leave-review', [HomeController::class, 'leaveReview']);



Route::resource('items',AdminController::class);


Route::get('/founditems', [AdminController::class, 'foundItems'])->name('foundItems');

// Route::post('/Register',[UserController::class, 'register']);
// Route::post('/Logout',[UserController::class, 'logout']);
// Route::post('/Login',[UserController::class, 'login']);


Route::get('/create-admin', [AdminController::class, 'createAdmin']);


// Route for displaying the form to create a new review
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::middleware(['auth'])->group(function () {
    Route::resource('reviews', ReviewController::class)->except(['index', 'create', 'store']);
    Route::get('reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
});


Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::post('/login',[AuthController::class, 'loginPost'])->name('login.post');

Route::get('/registration',[AuthController::class, 'registration'])->name('registration');
Route::post('/registration',[AuthController::class, 'registrationPost'])->name('registration.post');

Route::get('/logout',[AuthController::class, 'logout'])->name('logout');

