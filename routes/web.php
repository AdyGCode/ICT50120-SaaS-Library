<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProductController;
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

// Routes requiring authentication
Route::group(['middleware' => ['auth']], function () {
    Route::resource('authors', AuthorController::class);
    Route::get("/authors/{author}/delete", [AuthorController::class, 'delete'])->name('authors.delete');

    /*
     * The following routes will be uncommented as the various features
     * are added to the project.
    */
    Route::resource('books', BookController::class);
    // Route::resource('genres', GenreController::class);
    // Route::resource('countries', CountryController::class);

    /*
     * The users, roles and permissions routes will NOT have any exceptions, plus
     * they will require the correct permissions to use them. More on this
     * in a later section of the tutorial.
     */
    Route::resource('users', UserController::class);
    // Route::resource('roles', RoleController::class);
    // Route::resource('permissions', PermissionController::class);

    /* Logout a logged-in user */
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('/dashboard', [StaticPageController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');



/**
 * Using Spatie's Health package
 */
Route::get('/health', HealthCheckResultsController::class);

require __DIR__.'/auth.php';
