<?php

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
    return view('index');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');



Route::get('/article-edit', [App\Http\Controllers\DashboardController::class, 'editArticle'])->name('article_edit');
Route::get('/category-edit', [App\Http\Controllers\DashboardController::class, 'editCategory'])->name('category_edit');

Route::get('/gallery', [App\Http\Controllers\ImagesController::class, 'getimages'])->name('getimages');

Route::get('/add-article', [App\Http\Controllers\DashboardController::class, 'add_article'])->name('add-article');
Route::get('/articles', [App\Http\Controllers\DashboardController::class, 'articles'])->name('articles');

Route::get('/сategories', [App\Http\Controllers\DashboardController::class, 'сategories'])->name('сategories');
Route::get('/add-сategory', [App\Http\Controllers\DashboardController::class, 'add_category'])->name('add-category');

//form post
Route::post('/category_add', [App\Http\Controllers\CategoriesController::class, 'category_add'])->name('category_add');

Route::get('/getarticles', [App\Http\Controllers\ArticlesController::class, 'getarticles'])->name('getarticles');

Route::get('/roles', [App\Http\Controllers\DashboardController::class, 'roles'])->name('roles');
Route::get('/role-edit', [App\Http\Controllers\DashboardController::class, 'editRole'])->name('role_edit');
Route::get('/add-role', [App\Http\Controllers\DashboardController::class, 'add_role'])->name('add-role');
Route::get('/add-permission', [App\Http\Controllers\DashboardController::class, 'add_permission'])->name('add-permission');
Route::get('/permissions', [App\Http\Controllers\DashboardController::class, 'permissions'])->name('permissions');

Route::get('/users', [App\Http\Controllers\DashboardController::class, 'users'])->name('users');
Route::get('/add-user', [App\Http\Controllers\DashboardController::class, 'add_user'])->name('add_user');
Route::get('/edit-user', [App\Http\Controllers\DashboardController::class, 'edit_user'])->name('edit_user');

Route::post('dashboard-images', [App\Http\Controllers\FileUploadController::class, 'dashboard_images' ])->name('dashboard_images');
