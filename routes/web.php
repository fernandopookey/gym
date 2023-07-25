<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SourceCodeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('tes');
// });


// Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

//======================================== ADMIN ========================================
Route::prefix('/')->namespace('Admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('member', '\App\Http\Controllers\Member\MemberController');
    Route::resource('member-package', '\App\Http\Controllers\Member\MemberPackageController');
    Route::resource('member-package-type', '\App\Http\Controllers\Member\MemberPackageTypeController');
    Route::resource('member-package-category', '\App\Http\Controllers\Member\MemberPackageCategoryController');

    Route::resource('trainer', '\App\Http\Controllers\Trainer\TrainerController');
    Route::resource('trainer-package', '\App\Http\Controllers\Trainer\TrainerPackageController');
    Route::resource('trainer-package-type', '\App\Http\Controllers\Trainer\TrainerPackageTypeController');
    Route::resource('trainer-transaction-type', '\App\Http\Controllers\Trainer\TrainerTransactionTypeController');

    Route::resource('source-code', '\App\Http\Controllers\Admin\SourceCodeController');
    Route::resource('method-payment', '\App\Http\Controllers\Admin\MethodPaymentController');
    Route::resource('sold-by', '\App\Http\Controllers\Admin\SoldByController');
    Route::resource('refferal', '\App\Http\Controllers\Admin\RefferalController');

    Route::resource('staff', '\App\Http\Controllers\Staff\StaffController');
    Route::resource('administrator', '\App\Http\Controllers\Staff\AdministratorController');
    Route::resource('class-instructor', '\App\Http\Controllers\Staff\ClassInstructorController');
    Route::resource('customer-service', '\App\Http\Controllers\Staff\CustomerServiceController');
    Route::resource('customer-service-pos', '\App\Http\Controllers\Staff\CustomerServicePosController');
    Route::resource('fitness-consultant', '\App\Http\Controllers\Staff\FitnessConsultantController');
    Route::resource('personal-trainer', '\App\Http\Controllers\Staff\PersonalTrainerController');
    Route::resource('physiotherapy', '\App\Http\Controllers\Staff\PhysiotherapyController');
    Route::resource('pt-leader', '\App\Http\Controllers\Staff\PTLeaderController');

    Route::resource('studio-booking', '\App\Http\Controllers\Admin\StudioBookingController');
    Route::resource('studio-package', '\App\Http\Controllers\Admin\StudioPackageController');
    Route::resource('studio-transactions', '\App\Http\Controllers\Admin\StudioTransactionController');

    Route::resource('locker-package', '\App\Http\Controllers\Admin\LockerPackageController');
    Route::resource('locker-transaction', '\App\Http\Controllers\Admin\LockerTransactionController');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');