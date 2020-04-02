<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memory extends Model
{
  protected $fillable = ['user_id', 'date', 'image', 'notes'];
  protected $dates = ['date'];
  
  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
