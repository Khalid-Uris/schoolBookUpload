<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LogSessionController;
use App\Models\LogSession;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
//     return view('welcome');
// });

Route::view('master', 'admin/master');

// Student Login forms
Route::get('/',[StudentController::class,'loginView'])->name('student.loginView');
Route::get('/student/loginStudent',[StudentController::class,'loginStudent'])->name('student.loginStudent');
Route::get('/student/logoutStudent',[StudentController::class,'logoutStudent'])->name('student.logoutStudent');
// Finish

//Student Middleware
Route::middleware(['studentPage'])->group(function () {


});

//Admin Login Page
Route::get('/admin/adminView',[AdminController::class,'adminView'])->name('admin.adminView');
Route::get('/admin/adminLogin',[AdminController::class,'adminLogin'])->name('admin.adminLogin');
Route::get('/admin/adminLogout',[AdminController::class,'adminLogout'])->name('admin.adminLogout');

//Student Registration Page
Route::get('/student/index',[StudentController::class,'index'])->name('student.index');
Route::post('/student/store',[StudentController::class,'store'])->name('student.store');
//finish


//Admin Middleware
Route::middleware(['adminPage'])->group(function () {
//Dashboard
Route::get('/dashboard/index',[DashBoardController::class,'index'])->name('dashboard.index');

//Student Pages
Route::get('/student/show',[StudentController::class,'show'])->name('student.show');
Route::get('/student/edit/{id}',[StudentController::class,'edit'])->name('student.edit');
Route::post('/student/update/{id}',[StudentController::class,'update'])->name('student.update');
Route::get('/student/destroy/{id}',[StudentController::class,'destroy'])->name('student.destroy');

//Books Route
Route::get('/book/index',[BookController::class,'index'])->name('book.index');
Route::post('/book/store',[BookController::class,'store'])->name('book.store');

Route::get('/book/destroy/{id}',[BookController::class,'destroy'])->name('book.destroy');

//Login and Logout session
Route::get('/logSession/show',[LogSessionController::class,'show'])->name('logSession.show');
});
//Admin middleware end


Route::get('test', [StudentController::class, 'test']);


// Show Books for Student
Route::get('/book/show',[BookController::class,'show'])->name('book.show');
Route::get('/book/view/{id}',[BookController::class,'view'])->name('book.view');




//Forget Password
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');




//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});
//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});
//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});
//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});
//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});
//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});
