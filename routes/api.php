<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\HallController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\FrequencyController;
use App\Http\Controllers\Api\SubscriberController;
use App\Http\Controllers\Api\UserProfileController;
use App\Http\Controllers\Api\UserBookingsController;
use App\Http\Controllers\Api\HallBookingsController;
use App\Http\Controllers\Api\FamilyDetailsController;
use App\Http\Controllers\Api\SubscriberTypeController;
use App\Http\Controllers\Api\UserUserProfilesController;
use App\Http\Controllers\Api\FrequencySubscribersController;
use App\Http\Controllers\Api\SubscriberTypeSubscribersController;

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

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('users', UserController::class);

        // User User Profiles
        Route::get('/users/{user}/user-profiles', [
            UserUserProfilesController::class,
            'index',
        ])->name('users.user-profiles.index');
        Route::post('/users/{user}/user-profiles', [
            UserUserProfilesController::class,
            'store',
        ])->name('users.user-profiles.store');

        // User Bookings
        Route::get('/users/{user}/bookings', [
            UserBookingsController::class,
            'index',
        ])->name('users.bookings.index');
        Route::post('/users/{user}/bookings', [
            UserBookingsController::class,
            'store',
        ])->name('users.bookings.store');

        Route::apiResource(
            'all-family-details',
            FamilyDetailsController::class
        );

        Route::apiResource('frequencies', FrequencyController::class);

        // Frequency Subscribers
        Route::get('/frequencies/{frequency}/subscribers', [
            FrequencySubscribersController::class,
            'index',
        ])->name('frequencies.subscribers.index');
        Route::post('/frequencies/{frequency}/subscribers', [
            FrequencySubscribersController::class,
            'store',
        ])->name('frequencies.subscribers.store');

        Route::apiResource('subscriber-types', SubscriberTypeController::class);

        // SubscriberType Subscribers
        Route::get('/subscriber-types/{subscriberType}/subscribers', [
            SubscriberTypeSubscribersController::class,
            'index',
        ])->name('subscriber-types.subscribers.index');
        Route::post('/subscriber-types/{subscriberType}/subscribers', [
            SubscriberTypeSubscribersController::class,
            'store',
        ])->name('subscriber-types.subscribers.store');

        Route::apiResource('subscribers', SubscriberController::class);

        Route::apiResource('user-profiles', UserProfileController::class);

        Route::apiResource('bookings', BookingController::class);

        Route::apiResource('halls', HallController::class);

        // Hall Bookings
        Route::get('/halls/{hall}/bookings', [
            HallBookingsController::class,
            'index',
        ])->name('halls.bookings.index');
        Route::post('/halls/{hall}/bookings', [
            HallBookingsController::class,
            'store',
        ])->name('halls.bookings.store');
    });
