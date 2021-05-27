<?php

use App\Http\Controllers\UserController;
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
Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('userList');
    Route::get('{id}/delete', [UserController::class, 'deteleUser'])->name('user.delete');
    Route::get('from-create',[UserController::class,'showCreateUserForm'])->name('showCreateUserForm');
    Route::post('creatUser',[UserController::class,'createUser'])->name('createUser');
    Route::get('{id}/form-edit',[UserController::class,'showEditUserForm'])->name('showEditUserForm');
    Route::post('editUser',[UserController::class,'editUser'])->name('edit.user');
});
