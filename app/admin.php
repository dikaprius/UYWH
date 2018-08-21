<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
  public function user()
  {
      return $this->belongsTo(User::class);
  }
}
