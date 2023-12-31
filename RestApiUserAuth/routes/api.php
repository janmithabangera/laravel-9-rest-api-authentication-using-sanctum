<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProfileController;

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

// User Controller Routes
Route::controller(UserController::class)->group(function () {
  Route::post('register', 'register');
  Route::post('login', 'login');
});


Route::middleware('auth:sanctum')->group(function () {
  // Article Controller Routes
  Route::post('/{user_id}/articles/create', [ArticleController::class, 'store']);
  Route::get('/{user_id}/articles', [ArticleController::class, 'index']);
  Route::get('/{user_id}/articles/{article_id}', [ArticleController::class, 'show']);
  Route::post('/{user_id}/articles/{article_id}/update', [ArticleController::class, 'update']);
  Route::post('/{user_id}/articles/{article_id}/destroy', [ArticleController::class, 'destroy']);
  Route::post('/{user_id}/articles/{article_id}/add-comment', [ArticleController::class, 'addComment']);
  // Profile Controller Routes
  Route::post('/{user_id}/profile-create', [ProfileController::class, 'store']);
  Route::post('/{user_id}/{profile_id}/update', [ProfileController::class, 'update']);
  Route::get('/{user_id}/{profile_id}', [ProfileController::class, 'show']);

  Route::post('/{user_id}/logout', [UserController::class, 'logout']);
});
