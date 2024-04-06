<?php

use App\Http\Controllers\CrudController;
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

Route::get('/',[CrudController::class, 'index'])->name('home');

Route::get('/crear', function() {
    return view('info.create');
})->name('crear');


Route::post('/store', [CrudController::class, 'store'])->name('store');

Route::get('/editar/{id}', [CrudController::class, 'editar'])->name('edit');

Route::put('/update/{infoId}', [CrudController::class, 'update'])->name('update');

Route::delete('/delete/{id}', [CrudController::class, 'delete'])->name('delete');