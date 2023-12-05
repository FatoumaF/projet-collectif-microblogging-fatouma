<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\PostController;

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
Route::get('/', function(){
    return view('welcome');
});

// Route::get('/', [TodoListController::class, 'index']);

Route::post('/saveItem', [PostController::class, 'savePost'])->name('saveItem');

Route::post('/markComplete/{id}', [TodoListController::class,'markComplete'])->name('markComplete');