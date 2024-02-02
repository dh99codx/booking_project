<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\FrequencyController;
use App\Http\Controllers\Api\SubscriberController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\UserProfileController;
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
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

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
    });
