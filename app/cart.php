<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\File;
use Laravel\Scout\Searchable;

class cart extends Model
{
  protected $fillable = [
    'user_id',
    'file_id',
    'harga_barang',
    'jumlah_barang'
   ];

   public function user()
   {
       return $this->belongsTo('App\User');
   }

   public function file()
   {
     return $this->belongsTo('App\File');
   }
}
