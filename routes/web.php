<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FrequencyController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\UserProfileController;
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


Route::group(['prefix' => '/', 'middleware' => ['auth', 'verified']], function() {

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
    Route::resource('user-profiles', UserProfileController::class);

    Route::put('/user-profile-update/{id}',[UserProfileController::class,'update_profile'])->name('user_profile_update');
    Route::post('/user-profile-store/{id}',[UserProfileController::class,'update_profile_store'])->name('user_profile_store');


    /*role management controller */

    Route::get('/manage-account',[\App\Http\Controllers\ManagementsController::class,'index'])->name('managements');
    Route::get('/manage-account-create',[\App\Http\Controllers\ManagementsController::class,'create'])->name('manage-account-create');
    Route::post('/manage-account-store',[\App\Http\Controllers\ManagementsController::class,'store'])->name('manage-account-store');

    /*delete record*/

    Route::delete('/manage-account-delete',[\App\Http\Controllers\ManagementsController::class,'destroy'])->name('manage-account-delete');

    /*Account Activate &  Deactivate*/
    Route::delete('/user-activate-deactivate/{status}',[UserProfileController::class,'activate_deactivate'])->name('account_activate_deactivate');

    Route::get('/profile-page', [HomeController::class, 'profile_page'])->name('profile_page')->middleware('verified');


    /*Edit*/
    Route::get('/family-details-edit-customer/{id}', [
        FamilyDetailsController::class,
        'edit_family_details',
    ])->name('edit_family_details');


    /*family details customer*/
    Route::get('/family-details-create-customer', [
        FamilyDetailsController::class,
        'create_family_details',
    ])->name('family_details_customer');

    /*family details customer*/

    Route::post('/family-details-store-customer', [
        FamilyDetailsController::class,
        'create_family_details_store',
    ])->name('create_family_details_store');

    /*family details customer*/

    Route::put('/family-details-update-customer/{id}', [
        FamilyDetailsController::class,
        'create_family_details_update',
    ])->name('create_family_details_update');



    Route::get('/family-details-customer', [
        FamilyDetailsController::class,
        'index_frontend',
    ])->name('create_family_details_index')->middleware('verified');

    /*family details delete*/
    Route::delete('/family-details-customer-delete/{data}', [FamilyDetailsController::class, 'delete_family_details',
    ])->name('create_family_details_delete')->middleware('verified');


    /*reset admin password*/
    Route::get('/reset-admin-password', [HomeController::class, 'reset_admin_password'])->name('reset_admin_password')->middleware('verified');

    Route::get('/customer-subscriber', [SubscriberController::class,'customer_subscriber'])->name('customer_subscriber');
    Route::post('/customer-subscriber-store', [SubscriberController::class,'customer_subscriber_store'])->name('customer_subscriber_store');

    Route::resource('bookings', BookingController::class);
    Route::resource('halls', HallController::class);

});


/*verify link*/
Route::get('/verify/{token}/{email}',[SubscriberController::class,'verify_token'])->name('verify-token');

Route::post('/send-sms', [SMSController::class, 'sendSMS']);

Route::get('/sms-form', function () {
    return view('sms_form');
});

/*-----------------------*/

Route::get('2fa', [App\Http\Controllers\TwoFAController::class, 'index'])->name('2fa.index');
Route::post('2fa', [App\Http\Controllers\TwoFAController::class, 'store'])->name('2fa.post');
Route::get('2fa/reset', [App\Http\Controllers\TwoFAController::class, 'resend'])->name('2fa.resend');

Route::post('mobile-number-reset', [App\Http\Controllers\TwoFAController::class, 'mobile_number_reset'])->name('mobile_number_reset');

