<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostsController extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $locale = App::getLocale();

    $posts = Post::query()
      ->where('locale', $locale)
      ->paginate(10);

    return view('admin.posts.index', ['posts' => $posts]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    $locale = App::getLocale();

    $categories = Category::query()
      ->where('locale', $locale)
      ->get(['id', 'name']);

    return view('admin.posts.form', ['categories' => $categories]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CreatePostRequest $request) {
    $image = '/storage/' . $request->headingImage->store('images');

    Post::create([
      'title' => $request->title,
      'slug' => Str::slug($request->title),
      'description' => $request->description,
      'content' => $request->content,
      'headingImage' => $image,
      'locale' => App::getLocale(),
      'user_id' => Auth::id(),
      'category_id' => $request->category
    ]);

    return redirect()
      ->route('posts.index')
      ->with('alert', ['success', 'Post Created Successfully!']);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Post  $post
   * @return \Illuminate\Http\Response
   */
  public function show(Post $post) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Post  $post
   * @return \Illuminate\Http\Response
   */
  public function edit(Post $post) {
    $locale = App::getLocale();

    $categories = Category::query()
      ->where('locale', $locale)
      ->get(['id', 'name']);

    return view('admin.posts.form', [
      'categories' => $categories,
      'post' => $post
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Post  $post
   * @return \Illuminate\Http\Response
   */
  public function update(UpdatePostRequest $request, Post $post) {
    if ($request->headingImage) {
      $post->deleteImage();
      $newImage = '/storage/' . $request->headingImage->store('images');
      $post->headingImage = $newImage;
    }

    $post->title = $request->title;
    $post->slug = Str::slug($request->title);
    $post->description = $request->description;
    $post->content = $request->content;
    $post->category_id = $request->category;

    $post->save();

    return redirect()
      ->route('posts.index')
      ->with('alert', ['info', 'Post Updated Successfully!']);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Post  $post
   * @return \Illuminate\Http\Response
   */
  public function destroy(Post $post) {
    //
  }
}
