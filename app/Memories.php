<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memories extends Model
{
  protected $guard = [];


  public function user()
  {
    $this->belongsTo(User::class);
  }
}
