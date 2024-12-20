<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;




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
Route::get('/', function () {
    return view('landing/landing');
});
Route::get('/create', [ReportController::class, 'create'])->name('report.create');

Route::get('/report', [ReportController::class, 'index'])->name('report.myreport');

Route::post('/report/store', [ReportController::class, 'store'])->name('report.store');



Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/login/page', [LoginController::class, 'ShowLogin'])->name('login.page');

// Rute untuk halaman registrasi
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);




// Route untuk login

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware('auth')->get('/articles', [ArticleController::class, 'index'])->name('articles');

// Route artikel, hanya dapat diakses jika sudah login
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');


// Rute untuk login
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Rute untuk membuat akun
Route::post('/create-account', [LoginController::class, 'createAccount'])->name('createAccount');

Route::get('/report/{id}', [ReportController::class, 'show'])->name('report.show');

// Route::get('/report/{id}/info', [ReportController::class, 'pageArtikelInfo'])->name('report.info');

// Route::get('/report/{id}/comment', [ReportController::class, 'storeComment'])->name('report.comment');

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
