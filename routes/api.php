<?php

use App\Http\Controllers\API\ApiFallbackController;
use App\Http\Controllers\API\AuthAPIController;
use App\Http\Controllers\API\AuthorAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Health\Http\Controllers\HealthCheckJsonResultsController;

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

Route::post('register', [AuthAPIController::class, 'register']);
Route::post('login', [AuthAPIController::class, 'login']);

// Resourceful API Routes (harder to apply authenticated access to)
// Route::apiResource('authors', AuthorAPIController::class);
//
// We split the routes up into publicly accessible
// and those requiring Authentication

// Public API Routes
// Authors: Browse, Read, Search
Route::get("/authors", [AuthorAPIController::class, 'index']);
Route::get("/authors/search", [AuthorAPIController::class, 'search']);
Route::get("/authors/{id}", [AuthorAPIController::class, 'show']);

Route::apiResource('/books', \App\Http\Controllers\API\BookAPIController::class);

// Authentication required API Routes (Auth-Sanctum Middleware)
Route::group(['middleware' => ['auth:sanctum']], function () {

    /* Prefix the given routes with /authors
     * Based on http://laravel-school.com/posts/building-a-delighted-restful-api-with-laravel-16
     */
    Route::prefix('authors')->group(function () {
//        Route::get('/search', [AuthAPIController::class, 'search']);
//        Route::get("{id}", [AuthorAPIController::class, 'show']);
        Route::post('/', [AuthorAPIController::class, 'store']);
        Route::put('/{id}', [AuthorAPIController::class, 'update']);
        Route::delete('/{id}', [AuthorAPIController::class, 'destroy']);
    });

    /* Logout a logged-in user */
    Route::post('/logout', [AuthorAPIController::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/**
 * Using Spatie's Health package
 */
Route::get('health', HealthCheckJsonResultsController::class);


/*********************************************************************/

/**
 * Dummy Healthcheck
 *
 * Check that the service is up. If everything is okay, you'll get a 200 OK response.
 *
 * Otherwise, the request will fail with a 400 error, and a response listing the failed services.
 *
 * This is disabled, as a dummy and non-operational
 *
 * @response        400         scenario="Service is unhealthy"
 *                              {"status": "down",
 *                               "services": {"database": "up", "redis": "down"}}
 * @responseField   status      The status of this API (`up` or `down`).
 * @responseField   services    Map of each downstream service and their status (`up` or `down`).
 */
Route::get('/healthcheck', function () {
    return response()->json([
        'status' => 'unknown',
        'services' => [
            'database' => 'unknown',
            'redis' => 'unknown',
            'minio' => 'unknown',
            'mail' => 'unknown',
            'load' => 'unknown',
        ],
    ]);
});

/* Fallback route with nice error message */
Route::fallback([ApiFallbackController::class, 'error']);
