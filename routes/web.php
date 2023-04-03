<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Invite\UsersController;

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
    return view('index');
});

Route::group(['prefix' => 'inv'], function () {
    Route::get('/', [UsersController::class, 'index'])->name('invitePage');
    Route::get('/{slug}', [UsersController::class, 'path'])->name('invitePage');
});

Route::post('/rsvp', [UsersController::class, 'store'])->name('rsvp');
Route::get('/secureadmin', [UsersController::class, 'admin'])->name('admin');
