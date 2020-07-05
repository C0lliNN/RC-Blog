<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model {
  protected $fillable = [
    'title',
    'slug',
    'description',
    'content',
    'headingImage',
    'locale',
    'user_id',
    'category_id'
  ];

  public function author() {
    return $this->belongsTo(User::class);
  }

  public function category() {
    return $this->belongsTo(Category::class);
  }

  public function getRouteKey() {
    return $this->slug;
  }

  public function getRouteKeyName() {
    return 'slug';
  }

  public function deleteImage() {
    Storage::delete(Str::substr($this->headingImage, 8));
  }
}
