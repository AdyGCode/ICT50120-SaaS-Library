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

/**
 * Static links and pages (non-authenticated)
 */
Route::get('/', [StaticPageController::class, 'home'])
    ->name('home');
Route::get('/about', [StaticPageController::class, 'about'])
    ->name('about');
Route::get('/contact', [StaticPageController::class, 'contact'])
    ->name('contact');
Route::get('/support', [StaticPageController::class, 'support'])
    ->name('support');
Route::get('/privacy', [StaticPageController::class, 'privacy'])
    ->name('privacy');


// Routes requiring authentication

Route::get('/admin/dashboard', [StaticPageController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('admin.dashboard');

Route::group(['middleware' => ['auth']], function () {
    // Add the (resourceful) routes as needed...
    Route::prefix('admin')->group(function () {
        Route::resource('users', UserController::class);

        Route::resource('books', BookController::class);

        Route::resource('roles', RoleController::class);

        Route::resource('permissions', PermissionController::class);

        //Route::get("/authors/search", [AuthorController::class, 'search']);
        Route::get('/{author}/delete', [AuthorController::class, 'delete'])
            ->name("authors.delete");
        Route::resource('authors', AuthorController::class);


        /* These are placeholder routes to indicate the admin pages are not implemented */
        Route::get('/publishers', function () {
            if (auth()) {
                return redirect('admin/dashboard')->with('error', 'Publishers not implemented');
            }
            return redirect('/')->with('error', 'Publishers not implemented');
        })->name("publishers.index");
        Route::get('/books', function () {
            if (auth()) {
                return redirect('admin/dashboard')->with('error', 'Books not implemented');
            }
            return redirect('/')->with('error', 'Books not implemented');
        })->name("books.index");
        Route::get('/genres', function () {
            if (auth()) {
                return redirect('admin/dashboard')->with('error', 'Genres not implemented');
            }
            return redirect('/')->with('error', 'Genres not implemented');
        })->name("genres.index");
        Route::get('/countries', function () {
            if (auth()) {
                return redirect('admin/dashboard')->with('error', 'Countries not implemented');
            }
            return redirect('/')->with('error', 'Countries not implemented');
        })->name("countries.index");


    });


    /* Logout a logged-in user */
    Route::post('/logout', [AuthController::class, 'logout']);
});

/**
 * Using Spatie's Health package
 */
Route::get('/health', HealthCheckResultsController::class);

require __DIR__.'/auth.php';
