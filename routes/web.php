<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KontenSubSubMateriController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\SubMateriController;
use App\Http\Controllers\SubSubMateriController;
use App\Http\Controllers\DetailSsmController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->group(function () {
    Route::get('/', [AuthController::class, 'showLoginForm']);
});


Route::prefix('materi')->group(function () {
    Route::get('/', [MateriController::class, 'indexMateri'])->name('materi.index');
    Route::post('/', [MateriController::class,'store']);
    Route::get('/create', [MateriController::class, 'create'])->name('materi.create');
    Route::put('/{id}/edit', [MateriController::class, 'update'])->name('materi.update');
    Route::get('/{id}/edit', [MateriController::class, 'edit'])->name('materi.edit');

    Route::get('/{id}', [MateriController::class, 'show'])->name('materi.show');
});


Route::prefix('submateri')->group(function () {
    Route::post('/', [SubMateriController::class, 'store']);
    Route::get('/create', [SubMateriController::class, 'create'])->name('submateri.create');
    Route::put('/{id}/edit', [SubMateriController::class, 'update'])->name('submateri.update');

    Route::get('/{id}/edit', [SubMateriController::class, 'edit'])->name('submateri.edit');
    Route::get('/{id}', [SubMateriController::class, 'show'])->name('submateri.show');
});

Route::prefix('subsubmateri')->group(function () {
    Route::post('/', [SubSubMateriController::class, 'store']);

    Route::get('/create', [SubSubMateriController::class, 'create'])->name('subsubmateri.create');
    Route::get('/{id}', [SubSubMateriController::class, 'show'])->name('subsubmateri.show');
    Route::get('/{id}/edit', [SubSubMateriController::class, 'edit'])->name('subsubmateri.edit');
});

Route::prefix('detailssm')->group(function () {
    Route::post('/', [DetailSsmController::class, 'store']);
    Route::put('/{id}/edit', [DetailSsmController::class, 'update'])->name('detailssm.update');

    Route::get('/create', [DetailSsmController::class, 'create'])->name('detailssm.create');
    Route::get('/{id}', [DetailSsmController::class, 'show'])->name('detailssm.show');
    Route::get('/{id}/edit', [DetailSsmController::class, 'edit'])->name('detailssm.edit');
});


Route::get('kontensubsubmateri/create', [KontenSubSubMateriController::class, 'create'])->name('kontensubsubmateri.create');
Route::get('kontensubsubmateri/{id}', [KontenSubSubMateriController::class, 'show'])->name('kontensubsubmateri.show');
Route::get('kontensubsubmateri/{id}/edit', [KontenSubSubMateriController::class, 'edit'])->name('kontensubsubmateri.edit');


Route::get('/quiz', function () {
    return view('quis');
});

Route::get('/tambah-quiz', function () {
    return view('quis-create');
});