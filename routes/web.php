<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\Health\Http\Controllers\HealthCheckResultsController;

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

Route::get('/', [StaticPageController::class, 'home'])
    ->name('home');

// Routes not needing authentication
Route::get("authors", [AuthorController::class, 'index']);
//Route::get("/authors/search", [AuthorController::class, 'search']);
Route::resource('authors', AuthorController::class);

//Route::get("authors/{author}", [AuthorController::class, 'show'])->name('authors.show');
//Route::get("authors/create", [AuthorController::class, 'create'])->name('authors.create');
//Route::get("authors/{author}", [AuthorController::class, 'edit'])->name('authors.edit');


// Routes requiring authentication
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::prefix('authors')->group(function () {
//        Route::resource('authors', AuthorController::class);

//        Route::post('/', [AuthorController::class, 'store']);
//        Route::put('/{id}', [AuthorController::class, 'update']);
//        Route::patch('/{id}', [AuthorController::class, 'update']);
//        Route::delete('/{id}', [AuthorController::class, 'destroy']);
    });

});


Route::get('/dashboard', [StaticPageController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::group(['middleware' => ['auth']], function () {
    // Add the (resourceful) routes as needed...
    Route::resource('users', UserController::class);

    Route::resource('books', BookController::class);
});

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);

    /* Logout a logged-in user */
    Route::post('/logout', [AuthController::class, 'logout']);
});

/**
 * Using Spatie's Health package
 */
Route::get('/health', HealthCheckResultsController::class);

require __DIR__.'/auth.php';
