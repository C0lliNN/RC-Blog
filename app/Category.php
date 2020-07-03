<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
  protected $fillable = ['name', 'locale', 'slug'];
  public $timestamps = false;

  public function posts() {
    return $this->hasMany(Post::class);
  }

  public function getRouteKey() {
    return $this->slug;
  }

  public function getRouteKeyName() {
    return 'slug';
  }
}
