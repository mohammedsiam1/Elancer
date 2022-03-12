<?php

use App\Http\Controllers\Backend\CategoreisController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',    [CategoreisController::class,'index'])->name('index');
Route::get('index',[CategoreisController::class,'index']);
Route::get('/{id}',[CategoreisController::class,'show'])->name('backend.show');
Route::get('create/categories',[CategoreisController::class,'create'])->name('backend_create');
Route::post('store',[CategoreisController::class,'store'])->name('backend.store');
Route::get('/{id}/edit', [CategoreisController::class,'edit'])->name('edit');
Route::put('/{id}', [CategoreisController::class,'update'])->name('backend.update');
Route::delete('/{id}/delete', [CategoreisController::class,'delete'])->name('delete');
