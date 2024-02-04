<?php

use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.register');
});

Route::get('/dashboard', [SiteController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function(){
    #site controller
    Route::get('/profile', [SiteController::class, 'profile'])->name('profile.create');
    Route::get('/setting', [SiteController::class, 'setting'])->name('setting.create');

    #expense controller
    Route::post('/expense/edit', [ExpensesController::class, 'update'])->name('expense.update');
    Route::get('/expense', [ExpensesController::class, 'create'])->name('expense.create');

    #edit controller
    Route::put('/setting/user', [EditController::class, 'edit_user'])->name('setting.user');
    Route::put('/setting/sec', [EditController::class, 'edit_password'])->name('setting.pass');

    Route::get('/help',function(){
        return view('help-center');
    })->name('help');
});


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
