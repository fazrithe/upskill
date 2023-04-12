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

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [PageController::class, 'dashboardOverview1'])->name('dashboard-overview-1');
    Route::get('dashboard-overview-2-page', [PageController::class, 'dashboardOverview2'])->name('dashboard-overview-2');
    Route::get('dashboard-overview-3-page', [PageController::class, 'dashboardOverview3'])->name('dashboard-overview-3');
    Route::get('inbox-page', [PageController::class, 'inbox'])->name('inbox');
    Route::get('file-manager-page', [PageController::class, 'fileManager'])->name('file-manager');
    Route::get('point-of-sale-page', [PageController::class, 'pointOfSale'])->name('point-of-sale');
    Route::get('chat-page', [PageController::class, 'chat'])->name('chat');
    Route::get('post-page', [PageController::class, 'post'])->name('post');
    Route::get('calendar-page', [PageController::class, 'calendar'])->name('calendar');
    Route::get('crud-data-list-page', [PageController::class, 'crudDataList'])->name('crud-data-list');
    Route::get('crud-form-page', [PageController::class, 'crudForm'])->name('crud-form');
    Route::get('users-layout-1-page', [PageController::class, 'usersLayout1'])->name('users-layout-1');
    Route::get('users-layout-2-page', [PageController::class, 'usersLayout2'])->name('users-layout-2');
    Route::get('users-layout-3-page', [PageController::class, 'usersLayout3'])->name('users-layout-3');
    Route::get('profile-overview-1-page', [PageController::class, 'profileOverview1'])->name('profile-overview-1');
    Route::get('profile-overview-2-page', [PageController::class, 'profileOverview2'])->name('profile-overview-2');
    Route::get('profile-overview-3-page', [PageController::class, 'profileOverview3'])->name('profile-overview-3');
    Route::get('wizard-layout-1-page', [PageController::class, 'wizardLayout1'])->name('wizard-layout-1');
    Route::get('wizard-layout-2-page', [PageController::class, 'wizardLayout2'])->name('wizard-layout-2');
    Route::get('wizard-layout-3-page', [PageController::class, 'wizardLayout3'])->name('wizard-layout-3');
    Route::get('blog-layout-1-page', [PageController::class, 'blogLayout1'])->name('blog-layout-1');
    Route::get('blog-layout-2-page', [PageController::class, 'blogLayout2'])->name('blog-layout-2');
    Route::get('blog-layout-3-page', [PageController::class, 'blogLayout3'])->name('blog-layout-3');
    Route::get('pricing-layout-1-page', [PageController::class, 'pricingLayout1'])->name('pricing-layout-1');
    Route::get('pricing-layout-2-page', [PageController::class, 'pricingLayout2'])->name('pricing-layout-2');
    Route::get('invoice-layout-1-page', [PageController::class, 'invoiceLayout1'])->name('invoice-layout-1');
    Route::get('invoice-layout-2-page', [PageController::class, 'invoiceLayout2'])->name('invoice-layout-2');
    Route::get('faq-layout-1-page', [PageController::class, 'faqLayout1'])->name('faq-layout-1');
    Route::get('faq-layout-2-page', [PageController::class, 'faqLayout2'])->name('faq-layout-2');
    Route::get('faq-layout-3-page', [PageController::class, 'faqLayout3'])->name('faq-layout-3');
    Route::get('login-page', [PageController::class, 'login'])->name('login');
    Route::get('register-page', [PageController::class, 'register'])->name('register');
    Route::get('error-page-page', [PageController::class, 'errorPage'])->name('error-page');
    Route::get('update-profile-page', [PageController::class, 'updateProfile'])->name('update-profile');
    Route::get('change-password-page', [PageController::class, 'changePassword'])->name('change-password');
    Route::get('regular-table-page', [PageController::class, 'regularTable'])->name('regular-table');
    Route::get('tabulator-page', [PageController::class, 'tabulator'])->name('tabulator');
    Route::get('modal-page', [PageController::class, 'modal'])->name('modal');
    Route::get('slide-over-page', [PageController::class, 'slideOver'])->name('slide-over');
    Route::get('notification-page', [PageController::class, 'notification'])->name('notification');
    Route::get('accordion-page', [PageController::class, 'accordion'])->name('accordion');
    Route::get('button-page', [PageController::class, 'button'])->name('button');
    Route::get('alert-page', [PageController::class, 'alert'])->name('alert');
    Route::get('progress-bar-page', [PageController::class, 'progressBar'])->name('progress-bar');
    Route::get('tooltip-page', [PageController::class, 'tooltip'])->name('tooltip');
    Route::get('dropdown-page', [PageController::class, 'dropdown'])->name('dropdown');
    Route::get('typography-page', [PageController::class, 'typography'])->name('typography');
    Route::get('icon-page', [PageController::class, 'icon'])->name('icon');
    Route::get('loading-icon-page', [PageController::class, 'loadingIcon'])->name('loading-icon');
    Route::get('regular-form-page', [PageController::class, 'regularForm'])->name('regular-form');
    Route::get('datepicker-page', [PageController::class, 'datepicker'])->name('datepicker');
    Route::get('tom-select-page', [PageController::class, 'tomSelect'])->name('tom-select');
    Route::get('file-upload-page', [PageController::class, 'fileUpload'])->name('file-upload');
    Route::get('wysiwyg-editor-classic', [PageController::class, 'wysiwygEditorClassic'])->name('wysiwyg-editor-classic');
    Route::get('wysiwyg-editor-inline', [PageController::class, 'wysiwygEditorInline'])->name('wysiwyg-editor-inline');
    Route::get('wysiwyg-editor-balloon', [PageController::class, 'wysiwygEditorBalloon'])->name('wysiwyg-editor-balloon');
    Route::get('wysiwyg-editor-balloon-block', [PageController::class, 'wysiwygEditorBalloonBlock'])->name('wysiwyg-editor-balloon-block');
    Route::get('wysiwyg-editor-document', [PageController::class, 'wysiwygEditorDocument'])->name('wysiwyg-editor-document');
    Route::get('validation-page', [PageController::class, 'validation'])->name('validation');
    Route::get('chart-page', [PageController::class, 'chart'])->name('chart');
    Route::get('slider-page', [PageController::class, 'slider'])->name('slider');
    Route::get('image-zoom-page', [PageController::class, 'imageZoom'])->name('image-zoom');
});
