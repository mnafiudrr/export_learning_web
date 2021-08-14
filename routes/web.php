<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KontenSubSubMateriController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\SubMateriController;
use App\Http\Controllers\SubSubMateriController;
use App\Http\Controllers\DetailSsmController;

use App\Http\Controllers\QuisController;
use App\Http\Controllers\QuestionController;

use App\Http\Controllers\EventController;

use Illuminate\Support\Facades\Route;

Route::get(
    '/',
    function () {
        return view('welcome');
    }
);

Route::prefix('auth')->group(
    function () {
        Route::get('/', [AuthController::class, 'showLoginForm']);
    }
);

Route::prefix('materi')->group(
    function () {
        Route::get('/', [MateriController::class, 'indexMateri'])->name('materi.index');
        Route::post('/', [MateriController::class,'store']);
        Route::get('/create', [MateriController::class, 'create'])->name('materi.create');
        Route::put('/{id}/edit', [MateriController::class, 'update'])->name('materi.update');
        Route::get('/{id}/edit', [MateriController::class, 'edit'])->name('materi.edit');

        Route::get('/{id}', [MateriController::class, 'show'])->name('materi.show');
    }
);


Route::prefix('submateri')->group(
    function () {
        Route::post('/', [SubMateriController::class, 'store']);
        Route::get('/create', [SubMateriController::class, 'create'])->name('submateri.create');
        Route::put('/{id}/edit', [SubMateriController::class, 'update'])->name('submateri.update');

        Route::get('/{id}/edit', [SubMateriController::class, 'edit'])->name('submateri.edit');
        Route::get('/{id}', [SubMateriController::class, 'show'])->name('submateri.show');
    }
);

Route::prefix('subsubmateri')->group(
    function () {
        Route::post('/', [SubSubMateriController::class, 'store']);
        Route::put('/{id}/edit', [SubSubMateriController::class, 'update'])->name('subsubmateri.update');

        Route::get('/create', [SubSubMateriController::class, 'create'])->name('subsubmateri.create');
        Route::get('/{id}', [SubSubMateriController::class, 'show'])->name('subsubmateri.show');
        Route::get('/{id}/edit', [SubSubMateriController::class, 'edit'])->name('subsubmateri.edit');
    }
);

Route::prefix('detailssm')->group(
    function () {
        Route::post('/', [DetailSsmController::class, 'store']);
        Route::put('/{id}/edit', [DetailSsmController::class, 'update'])->name('detailssm.update');

        Route::get('/create', [DetailSsmController::class, 'create'])->name('detailssm.create');
        Route::get('/{id}', [DetailSsmController::class, 'show'])->name('detailssm.show');
        Route::get('/{id}/edit', [DetailSsmController::class, 'edit'])->name('detailssm.edit');
    }
);
Route::prefix('quis')->group(
    function () {
        Route::get('/', [QuisController::class, 'indexQuis']);

        Route::post('/', [QuisController::class, 'store']);
        Route::put('/{id}/edit', [QuisController::class, 'update'])->name('quis.update');

        Route::get('/create', [QuisController::class, 'create'])->name('quis.create');
        Route::get('/{id}', [QuisController::class, 'show'])->name('quis.show');
        Route::get('/{id}/edit', [QuisController::class, 'edit'])->name('quis.edit');
    }
);

Route::prefix('question')->group(
    function () {
        Route::get('/create', [QuestionController::class,'create']);
        
        Route::post('/', [QuestionController::class,'store']);
        Route::get('/{questionId}', [QuestionController::class,'show']);
    }
);


Route::prefix('event')->group(
    function () {
        Route::get('/', [EventController::class,'indexEvent']);
        Route::get('/create', [EventController::class,'create'])->name('event.create');
        
        
        Route::post('/', [EventController::class,'store']);
        Route::get('/show/{id}', [EventController::class,'show'])->name('event.show');
        Route::get('/{questionId}', [EventController::class,'show']);
    }
);
