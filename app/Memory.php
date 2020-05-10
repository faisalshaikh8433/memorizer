<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memory extends Model
{
  protected $fillable = ['user_id', 'date', 'image', 'notes', 'attributes'];
  protected $dates = ['date'];
  protected $casts = [
    'attributes' => 'array'
  ];
  
  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
