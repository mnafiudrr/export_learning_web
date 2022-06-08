<?php

use App\Http\Controllers\Api\MateriApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\QuisController;
use App\Http\Controllers\QuestionController;


use App\Http\Controllers\MateriController;
use App\Http\Controllers\SubMateriController;
use App\Http\Controllers\SubSubMateriController;

use App\Http\Controllers\MasterController;

use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('/auth/register', [UserController::class,'register']);



#---------------------------------------------------------------------
# ROUTE YANG BUTUH JWT TARO DISINI
#---------------------------------------------------------------------

Route::group(
    [
        'middleware' => 'api',
    ],
    function ($router) {
        Route::prefix('auth')->group(function () {
            Route::post('login', [AuthController::class, 'login']);
            Route::post('/logout', [AuthController::class,'logout']);
            Route::post('/refresh', [AuthController::class,'refresh']);
            Route::post('/me', [AuthController::class, 'me']);
            Route::post('/register', [UserController::class,'register']);
        });
    }
);
#---------------------------------------------------------------------

Route::prefix('master')->group(function () {
    Route::get('/app-logo', [MasterController::class,'getAppLogo']);
});

Route::prefix('materi')->group(function () {
    Route::get('/', [MateriController::class,'index']);
    Route::get('/{id}', [MateriController::class,'get']);
});


Route::prefix('submateri')->group(function () {
    Route::get('/', [SubMateriController::class,'index']);
    Route::get('/by-materi-id/{materiId}', [SubMateriController::class,'getSubMateriByMateriId']);
    Route::get('/{id}', [SubMateriController::class,'get']);
});

Route::prefix('subsubmateri')->group(function () {
    Route::get('/', [SubSubMateriController::class,'index']);
    Route::get('/by-submateri-id/{materiId}', [SubSubMateriController::class,'getSubSubMateriBySubMateriId']);
    Route::get('/{id}', [SubSubMateriController::class,'get']);
});


Route::prefix('quis')->group(function () {
    Route::get('/', [QuisController::class,'index']);
    Route::get('/{quisId}/questions', [QuestionController::class,'getByQuisId']);

    Route::get('/{id}', [QuisController::class,'get']);
    Route::post('/submit-answer', [QuisController::class,'submitQuis']);
    
});


Route::prefix('event')->group(function () {
    Route::get('/', [EventController::class,'index']);
    Route::post('/', [EventController::class,'store']);
    Route::delete('/{id}', [EventController::class,'destroy']);

    Route::get('/{id}', [EventController::class,'get']);
});

Route::prefix('new')->group(function () {

    Route::prefix('master')->group(function () {
        Route::get('app-logo', [MasterController::class,'getAppLogo']);
    });

    Route::prefix('materi')->group(function () {
        Route::get('', [MateriApiController::class,'index']);
        Route::get('{id}', [MateriApiController::class,'show']);
    });
    
});
