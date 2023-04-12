<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\ColorSchemeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FileCategoryController;
use App\Http\Controllers\TryoutController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use Spatie\Permission\Contracts\Role;

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

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');
Route::get('color-scheme-switcher/{color_scheme}', [ColorSchemeController::class, 'switch'])->name('color-scheme-switcher');

Route::middleware('loggedin')->group(function() {
    Route::get('login', [AuthController::class, 'loginView'])->name('login.index');
    Route::post('login', [AuthController::class, 'login'])->name('login.check');
    Route::get('register', [AuthController::class, 'registerView'])->name('register.index');
    Route::post('register', [AuthController::class, 'register'])->name('register.store');
});

Route::middleware('auth')->group(function() {

    //users
    Route::get('users', [UserController::class, 'index'])->name('users');
    Route::get('users-create', [UserController::class, 'create'])->name('users.create');
    Route::post('users-save', [UserController::class, 'store'])->name('users.save');
    Route::get('users-edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('users-update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users-delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('users-show/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('users-search/search', [UserController::class, 'search'])->name('users.search');
    Route::get('users-prodile/{id}', [UserController::class, 'profile'])->name('users.profile');
    Route::patch('users-profile-update/{id}', [UserController::class, 'profileUpdate'])->name('users.profile.update');
    Route::get('users-password/{id}', [UserController::class, 'password'])->name('users.password');
    Route::patch('users-password-update/{id}', [UserController::class, 'passwordUpdate'])->name('users.password.update');

    //roles
    Route::get('roles', [RoleController::class, 'index'])->name('roles');
    Route::get('roles-edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::get('roles-create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('roles-save', [RoleController::class, 'store'])->name('roles.save');
    Route::patch('roles-update/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('roles-delete/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
    Route::get('roles-show/{id}', [RoleController::class, 'show'])->name('roles.show');
    Route::get('roles-search/search', [RoleController::class, 'search'])->name('roles.search');


    Route::get('files', [FileController::class, 'index'])->name('files');
    Route::post('files-save', [FileController::class, 'store'])->name('files.save');
    Route::delete('files-delete/{id}', [FileController::class, 'destroy'])->name('files.destroy');

    Route::post('file-categories-save', [FileCategoryController::class, 'store'])->name('file.categories.save');
    Route::delete('file-categories-delete', [FileCategoryController::class, 'deleteAll'])->name('file.categories.deleteall');

    Route::get('tryouts', [TryoutController::class, 'index'])->name('tryouts');
    Route::get('tryouts-create', [TryoutController::class, 'create'])->name('tryouts.create');
    Route::post('tryouts-save', [TryoutController::class, 'store'])->name('tryouts.save');
    Route::get('tryouts-edit/{id}', [TryoutController::class, 'edit'])->name('tryouts.edit');
    Route::patch('tryouts-update/{id}', [TryoutController::class, 'update'])->name('tryouts.update');
    Route::delete('tryouts-delete/{id}', [TryoutController::class, 'destroy'])->name('tryouts.destroy');

    Route::get('tryout-lists', [TryoutController::class, 'list'])->name('tryouts.lists');
    Route::get('tryouts-view/{id}', [TryoutController::class, 'view'])->name('tryouts.view');
    Route::get('tryouts-test/{id}', [TryoutController::class, 'test'])->name('tryouts.test');
    Route::post('tryout-answer', [TryoutController::class, 'answer'])->name('tryouts.answer');
    Route::post('tryout-finish', [TryoutController::class, 'finish'])->name('tryouts.finish');

    Route::get('questions/{id}', [QuestionController::class, 'index'])->name('questions');
    Route::get('questions-create/{id}', [QuestionController::class, 'create'])->name('questions.create');
    Route::post('questions-save', [QuestionController::class, 'store'])->name('questions.save');
    Route::get('questions-search/search', [QuestionController::class, 'search'])->name('questions.search');
    Route::get('questions-edit/{id}', [QuestionController::class, 'edit'])->name('questions.edit');
    Route::patch('questions-update/{id}', [QuestionController::class, 'update'])->name('questions.update');
    Route::delete('questions-delete/{id}', [QuestionController::class, 'destroy'])->name('questions.destroy');

    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

});
