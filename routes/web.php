<?php

use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    // permissions
    Route::group(['prefix' => 'roles', 'middleware'=> ['can:manage-roles']], function () {
        Route::get('show', [RolesController::class, 'index'])->name('roles');
        Route::get('show/{id}', [RolesController::class, 'view'])->name('roles_show');
    });
    // users
    Route::group(['prefix' => 'users', 'middleware'=> ['can:manage-users']], function () {
        Route::get('show', [UsersController::class, 'index'])->name('users');
        Route::get('show/{id}', [UsersController::class, 'view'])->name('users_show');
    });
    // transactions
    Route::group(['prefix' => 'transactions', 'middleware'=> ['can:index-transactions']], function () {
        Route::get('show', [RolesController::class, 'index'])->name('transactions');
    });
});