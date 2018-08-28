<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
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
