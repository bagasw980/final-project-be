<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Blog\BlogController;
use App\Http\Controllers\API\Faq\FaqController;
use App\Http\Controllers\API\Public\Blog\BlogController as PublicBlogController;
use App\Http\Controllers\API\Public\Faq\FaqController as PublicFaqController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::fallback(function() {
    return response()->json([
        'message' => 'Resource not found'
    ], 404);
});

Route::prefix('/auth')->name('auth.')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:api')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/me', [AuthController::class, 'profile']);
    });
});

Route::middleware('auth:api')->prefix('/admin')->name('admin.')->group(function () {
    Route::prefix('/blog')->name('blog.')->group(function () {
        Route::get('/', [BlogController::class, 'index']);
        Route::post('/', [BlogController::class, 'store']);
        Route::get('/{id}', [BlogController::class, 'show']);
        Route::delete('/{id}', [BlogController::class, 'destroy']);
    });

    Route::prefix('/faq')->name('faq.')->group(function () {
        Route::get('/', [FaqController::class, 'index']);
        Route::post('/', [FaqController::class, 'store']);
        Route::delete('/{id}', [FaqController::class, 'destroy']);
    });
});

 /** public */
 Route::prefix('/blog')->name('blog.')->group(function () {
    Route::get('/', [PublicBlogController::class, 'index']);
    Route::get('/{id}', [PublicBlogController::class, 'show']);
});

Route::get('/faq', [PublicFaqController::class, 'index']);
