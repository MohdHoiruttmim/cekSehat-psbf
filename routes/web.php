<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Models\Pasien;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get("/redirectAuthenticatedUsers", [RedirectAuthenticatedUsersController::class, "home"]);
    Route::get('/', [AdminController::class, 'index'])->name('home');
    Route::get('user/{id}', [AdminController::class, 'update_show'])->name('update-user-show');
    Route::patch('user/{id}', [AdminController::class, 'update_store'])->name('update-user');

    Route::group(['middleware' => 'checkRole:admin'], function() {
        // Route::get('/adminDashboard', function () {
        //     return view('admin.index');
        // })->name('adminDashboard');
        Route::get('/user', [AdminController::class, 'add_user'])->name('add-user');
        Route::get('/userdata', [AdminController::class, 'data_user'])->name('data-user');
        Route::get('/log', [AdminController::class, 'log_activity'])->name('log-activity');
        Route::get('/checkup', [AdminController::class, 'checkup'])->name('checkup');
        Route::post('/checkup', [AdminController::class, 'checkup_store'])->name('checkup-store');
        Route::get('/newcheckup', [AdminController::class, 'checkup_show'])->name('checkup-new');
        Route::get('/cetak', [AdminController::class, 'cetak'])->name('cetak');
        Route::post('/user', [AdminController::class, 'store'])->name('add-user');
        Route::delete('user/{id}', [AdminController::class, 'delete'])->name('delete-user');
    });


    Route::group(['middleware' => 'checkRole:user'], function() {
        Route::get('/beranda', function () {
            return view('users.index');
        })->name('userDashboard');
        Route::get('/riwayat', [UserController::class, 'riwayat'])->name('riwayat');
    });

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
