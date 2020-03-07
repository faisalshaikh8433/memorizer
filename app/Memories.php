<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memories extends Model
{
  protected $fillable = ['user_id', 'date', 'image', 'notes'];
  protected $dates = ['date'];
  
  // protected $attributes = [
  //   'details' => 'test'
  // ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
