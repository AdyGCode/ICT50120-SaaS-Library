<?php

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

// Resourceful Routes (harder to apply authenticated access to)
// We split the routes up into Publically accessible
// and those requiring Authentication
// Route::resource('authors', AuthorAPIController::class);

// Public API Routes
Route::get("/authors", [AuthAPIController::class,'index']);
Route::get("/authors/{id}", [AuthAPIController::class,'show']);

// Authentication required API Routes
// We wrap these in "Auth" Middleware
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/author', [AuthorAPIController::class, 'store']);
    Route::put('/author/{id}', [AuthorAPIController::class, 'update']);
    Route::delete('/author/{id}', [AuthorAPIController::class, 'delete']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/**
 * Dummy Healthcheck
 *
 * Check that the service is up. If everything is okay, you'll get a 200 OK response.
 *
 * Otherwise, the request will fail with a 400 error, and a response listing the failed services.
 *
 * This is disabled, as a dummy and non-operational
 *
 * @response 400 scenario="Service is unhealthy" {"status": "down", "services": {"database": "up", "redis": "down"}}
 * @responseField status The status of this API (`up` or `down`).
 * @responseField services Map of each downstream service and their status (`up` or `down`).
 */
//Route::get('/healthcheck', function () {
//    return [
//        'status' => 'up',
//        'services' => [
//            'database' => 'up',
//            'redis' => 'up',
//        ],
//    ];
//});


/**
 * Using Spatie's Health package
 */
Route::get('health', HealthCheckJsonResultsController::class);
