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

Route::middleware('location')->group(function () {
  Route::middleware('guest')->group(function () {
    Route::view('/', 'blog.index')->name('blog.index');
    Route::view('/about', 'blog.about')->name('blog.about');
    Route::get('/categories', 'CategoriesController@index')->name(
      'blog.categories'
    );

    Route::view('/contact', 'blog.contact')->name('blog.contact');
  });
  Auth::routes([
    'register' => false,
    'password.confirm' => false,
    'password.email' => false,
    'password.request' => false,
    'password.reset' => false
  ]);

  Route::prefix('/admin')
    ->middleware('auth')
    ->group(function () {
      Route::get('/dashboard', 'DashboardController')->name('admin.dashboard');
      Route::resource('/categories', 'CategoriesController')->except(['show']);
      Route::resource('/posts', 'PostsController')->except(['show']);
      Route::resource('/users', 'UsersController')->except(['show']);
    });
});

Route::get('/home', 'HomeController@index')->name('home');
