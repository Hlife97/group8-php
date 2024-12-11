<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\HomeController;
use \Illuminate\Http\Request;
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
    return view('welcome');
});

//Route::get('/home', [HomeController::class, 'index']);
//Route::get('/about', [HomeController::class, 'about']);
//Route::get('/blog/{blogId}', [HomeController::class, 'blog']);
//Route::get('/sened/{senedId}/odeme/{odemeId?}', function($senedId, $odemeId = 3){
//    return 'Sened id '. $senedId . ' odeme id '.$odemeId;
//});

//Route::get('/contract', [HomeController::class, 'contract']);

// /blog?id=5&year=2024


//Route::get('/blog/{blogId}', function($blogId){
//    return 'Blog with ID: ' . $blogId;
//})->where('blogId', '[0-9]+');

//Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
//Route::post('/register', [RegisterController::class, 'register'])->name('register');
//Route::get('/users', [HomeController::class, 'users'])->name('users');
//a href="{{route('blogs.index')}}"

// /blogs/create

//Route::get('/test', TestController::class);

// /admin/users   /admin/blogs  /admin/cars

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/documents/{documentId}', [HomeController::class, 'documents'])->name('documents');

Route::name('blogs.')->prefix('blogs')->middleware('check.user')->group(function () {
    Route::controller(BlogController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/documents/{documentId}', 'documents')->name('documents');
        Route::post('/store', 'store')->name('store');
    });
});
















