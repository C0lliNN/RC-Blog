<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\HandleCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoriesController extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $locale = App::getLocale();

    $categories = Category::query()
      ->where('locale', $locale)
      ->paginate(10);

    if (Auth::check()) {
      return view('admin.categories.index', ['categories' => $categories]);
    } else {
      return view('blog.categories', ['categories' => $categories]);
    }
  }

  public function posts(Category $category) {
    return view('blog.category_posts', [
      'category' => $category,
      'posts' => $category->posts()->simplePaginate(5)
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    return view('admin.categories.form');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(HandleCategoryRequest $request) {
    Category::create([
      'name' => $request->name,
      'slug' => Str::slug($request->name),
      'locale' => App::getLocale()
    ]);
    return redirect()
      ->route('categories.index')
      ->with('alert', ['success', 'Category Created Successfully!']);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function edit(Category $category) {
    return view('admin.categories.form', ['category' => $category]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function update(HandleCategoryRequest $request, Category $category) {
    $category->update([
      'name' => $request->name,
      'slug' => Str::slug($request->name),
      'locale' => App::getLocale()
    ]);
    return redirect()
      ->route('categories.index')
      ->with('alert', ['info', 'Category updated successfully']);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function destroy(Category $category) {
    $category->delete();
    return redirect()
      ->route('categories.index')
      ->with('alert', ['success', 'Category deleted successfully']);
  }
}
