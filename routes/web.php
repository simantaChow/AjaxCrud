<?php

use App\Http\Controllers\CategorieController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {return view('create');});
Route::get('/categories', function () {return view('categories');});
Route::get('/getcategorybyid', function () {return view('update');});


//api
Route::post('/createcategories',[CategorieController::class,'CreateCategories'])->name('createcat');
Route::get('/getcategories',[CategorieController::class,'GetCategories'])->name('getcat');
Route::get('/getcategorybyid/{id}',[CategorieController::class,'GetCategoriesByID'])->name('getcatbyid');
