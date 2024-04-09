<?php

use App\Http\Controllers\AsientosContablesController;
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

//Inicio y crud de conceptos
Route::get('/',[CrudController::class, 'index'])->name('home');


Route::get('/crear', function() {
    return view('info.create');
})->name('crear');


Route::post('/store', [CrudController::class, 'store'])->name('store');

Route::get('/editar/{id}', [CrudController::class, 'editar'])->name('edit');


Route::put('/update/{infoId}', [CrudController::class, 'update'])->name('update');

Route::delete('deleteConcept/{id}', [CrudController::class, 'deleteConcept'])->name('delete');


//Crud proveedores
Route::get('/crud-proveedores',[CrudController::class, 'providerView'])->name('view.provider'); //vista principal de crud de proveedores
Route::get('/editar-proveedores/{id}',[CrudController::class, 'editProvider'])->name('editar.provider'); //vista de editar
Route::put('/updateProvider/{infoId}', [CrudController::class, 'updateProvider'])->name('update.provider'); //API para mandar datos a editar (logica) 
Route::delete('/deleteProvider/{id}', [CrudController::class, 'deleteProvider'])->name('delete.provider');
Route::get('/add-providers',function(){ return view('info.addProvider');})->name('add.provider'); //añadir (vista)
Route::post('/provider/store', [CrudController::class, 'storeProvider'])->name('store.provider'); //API para guardar datos


//Crud documentos
Route::get('/crud-documentos',[CrudController::class, 'documentView'])->name('view.document'); //vista principal de cruds de documentos
Route::get('/add-documentos', [CrudController::class, 'viewAddDocument'])->name('add.document'); //añadir (vista)
Route::get('/editarDocument/{id}', [CrudController::class, 'editarDocument'])->name('edit.document'); //Ediar (vista)
Route::delete('/deleteDocument/{id}', [CrudController::class, 'deleteDocument'])->name('delete.document'); //Eliminar
Route::put('/updateDocument/{infoId}', [CrudController::class, 'updateDocument'])->name('update.document'); //API para mandar datos a editar (logica)
Route::post('/document/store', [CrudController::class, 'storeDocument'])->name('store.document'); //API para guardar datos


//Crud de Asientos contables
Route::get('/crud-asientos-contables', [AsientosContablesController::class, 'index'])->name('view.asiento');
Route::get('/add-asientos-contables',function(){ return view('info.addAsiento');})->name('add.asiento');
Route::delete('/deleteaAsiento/{id}', [AsientosContablesController::class, 'delete'])->name('delete.asiento');
Route::get('/editarAsiento/{id}', [AsientosContablesController::class, 'editar'])->name('edit.asiento');
Route::put('/updateAsiento/{infoId}', [AsientosContablesController::class, 'update'])->name('update.asiento'); 
Route::post('/asiento/store', [AsientosContablesController::class, 'store'])->name('store.asiento'); //API para guardar datos
Route::post('/contabilizar-asientos', [AsientosContablesController::class, 'contabilizar'])->name('contabilizar.asientos');
