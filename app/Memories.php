<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memories extends Model
{
  protected $fillable = ['user_id', 'date', 'image', 'description', 'details'];


  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
