<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;

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

Route::get('/', function () {
    return view('beranda');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get("/redirectAuthenticatedUsers", [RedirectAuthenticatedUsersController::class, "home"]);

    Route::group(['middleware' => 'checkRole:admin'], function() {
        Route::get('/adminDashboard', function () {
            return view('admin.index');
        })->name('adminDashboard');
    });
    Route::group(['middleware' => 'checkRole:user'], function() {
        Route::get('/userDashboard', function () {
            return view('users.index');
        })->name('userDashboard');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
