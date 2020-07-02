<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
  protected $fillable = [
    'title',
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
}
