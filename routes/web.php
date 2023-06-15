<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApotekController;


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


Route::get('/', [ApotekController::class, 'landpage']);
Route::get('/index', [ApotekController::class, 'index'])->name('index');

Route::get('/add', [ApotekController::class, 'create'])->name('add');
Route::post('/add/send', [ApotekController::class, 'store'])->name('send');

Route::get('/trash', [ApotekController::class,'trash'])->name('trash');

Route::get('/edit/{id}', [ApotekController::class, 'edit'])->name('edit');
Route::patch('/update/{id}', [ApotekController::class, 'update'])->name('update');

Route::delete('/delete/{id}', [ApotekController::class, 'destroy'])->name('delete');//soft delete
Route::get('/restore/{id}', [ApotekController::class, 'restore'])->name('restore');
Route::get('/apotek/delete/permanent/{id}', [ApotekController::class, 'permanentDelete'])->name('permanent');


