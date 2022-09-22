<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  use HasFactory;
  // protected $with = ['category'];
  protected $guarded = [];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function scopeSearch($query, $value)
  {
    return $query
      ->where('name', 'like', '%' . $value . '%')
      ->orwhere('description', 'like', '%' . $value . '%')
      ->orwhere('price', 'like', '%' . $value . '%');
  }
}
