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

    Route::resource('member', '\App\Http\Controllers\Admin\MemberController');
    Route::resource('member-package', '\App\Http\Controllers\Admin\MemberPackageController');
    Route::resource('member-package-type', '\App\Http\Controllers\Admin\MemberPackageTypeController');
    Route::resource('member-package-category', '\App\Http\Controllers\Admin\MemberPackageCategoryController');

    Route::resource('trainer', '\App\Http\Controllers\Admin\TrainerController');
    Route::resource('trainer-package', '\App\Http\Controllers\Admin\TrainerPackageController');
    Route::resource('trainer-package-type', '\App\Http\Controllers\Admin\TrainerPackageTypeController');

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
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');