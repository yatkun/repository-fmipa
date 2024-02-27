<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KuisionerController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardMemberController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PDFController;


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


Route::get('/', [PostController::class,'index']);

Route::get('/contact', function () {
    return view('contact', [
        "title" => "Contact"
    ]);
});

//halaman single post
Route::get('posts/{id}', [PostController::class, 'show']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('admin');

Route::resource('dashboard/posts', DashboardPostController::class)->middleware('admin');
Route::resource('dashboard/members', DashboardMemberController::class)->middleware('admin');

Route::get('download/{id}', [PDFController::class, 'view'])->middleware('auth');