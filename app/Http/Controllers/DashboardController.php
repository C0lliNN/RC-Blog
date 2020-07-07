<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Category;
use App\Post;

class DashboardController extends Controller {
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request $request) {
    $locale = App::getLocale();

    $categories = Category::query()
      ->where('locale', $locale)
      ->paginate(10);
    $posts = Post::query()
      ->where('locale', $locale)
      ->paginate(10);

    return view('admin.dashboard', [
      'categories' => $categories,
      'posts' => $posts
    ]);
  }
}
