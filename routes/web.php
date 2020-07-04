<?php

use Illuminate\Support\Facades\Route;
use App\Category;

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
    // Dummy Data
    $categories = collect([
      ['name' => 'Tech', 'posts' => collect([1, 2, 3, 4])],
      ['name' => 'Travel', 'posts' => collect([1, 2, 3])],
      ['name' => 'Food', 'posts' => collect([1, 2, 3, 4, 5, 6])],
      ['name' => 'Sports', 'posts' => collect([1, 2])],
      ['name' => 'Events', 'posts' => collect([1, 2, 3])]
    ]);
    Route::view('/categories', 'blog.categories', [
      'categories' => $categories
    ])->name('blog.categories');
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
      Route::view('/dashboard', 'admin.dashboard', [
        'categories' => Category::all(),
        'posts' => collect([1, 2, 3, 4])
      ])->name('admin.dashboard');
      Route::resource('/categories', 'CategoriesController')->except(['show']);
      Route::resource('/posts', 'PostsController')->except(['show']);
    });
});

Route::get('/home', 'HomeController@index')->name('home');
