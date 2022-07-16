<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [PostController::class,'index'])->middleware(['auth'])->name('dashboard');

Route::get('/addpost', [PostController::class,'addpost'])->middleware(['auth'])->name('addpost');

Route::post('/storepost',[PostController::class,'storepost'])->name('storepost');

Route::get('/editpost/{id}', [PostController::class,'editpost'])->middleware(['auth'])->name('editpost');
Route::post('/updatepost',[PostController::class,'updatepost'])->name('updatepost');

Route::get('/deletepost/{id}',[PostController::class,'deletepost'])->name('deletepost');

require __DIR__.'/auth.php';
