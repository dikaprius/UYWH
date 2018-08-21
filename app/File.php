<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Laravel\Scout\Searchable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{

  use Notifiable, Searchable, SoftDeletes;

  protected $fillable = [
    'title',
    'filename',
    'kode_barang',
    'Description'
  ];
  protected $dates = ['deleted_at'];

  public function searchableAs()
    {
        return 'users_index';
    }
    public function cart()
    {
      return $this->hasMany('App\cart');
    }

}
