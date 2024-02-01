<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\FrequencyController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\FamilyDetailsController;
use App\Http\Controllers\SubscriberTypeController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');


Route::post('/test-form',[SubscriberController::class,'test_subscriber'])->name('test_subscriber');
Route::get('/test-form',[SubscriberController::class,'test_subscriber_form'])->name('test_subscriber_form');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('users', UserController::class);
        Route::get('all-family-details', [
            FamilyDetailsController::class,
            'index',
        ])->name('all-family-details.index');
        Route::post('all-family-details', [
            FamilyDetailsController::class,
            'store',
        ])->name('all-family-details.store');
        Route::get('all-family-details/create', [
            FamilyDetailsController::class,
            'create',
        ])->name('all-family-details.create');
        Route::get('all-family-details/{familyDetails}', [
            FamilyDetailsController::class,
            'show',
        ])->name('all-family-details.show');
        Route::get('all-family-details/{familyDetails}/edit', [
            FamilyDetailsController::class,
            'edit',
        ])->name('all-family-details.edit');
        Route::put('all-family-details/{familyDetails}', [
            FamilyDetailsController::class,
            'update',
        ])->name('all-family-details.update');
        Route::delete('all-family-details/{familyDetails}', [
            FamilyDetailsController::class,
            'destroy',
        ])->name('all-family-details.destroy');

        Route::resource('frequencies', FrequencyController::class);
        Route::resource('subscriber-types', SubscriberTypeController::class);
        Route::resource('subscribers', SubscriberController::class);
    })->middleware('verified');




Route::get('/customer-subscriber', [SubscriberController::class,'customer_subscriber'])->name('customer_subscriber');
Route::post('/customer-subscriber-store', [SubscriberController::class,'customer_subscriber_store'])->name('customer_subscriber_store');

/*verify link*/
Route::get('/verify/{token}/{email}',[SubscriberController::class,'verify_token'])->name('verify-token');

