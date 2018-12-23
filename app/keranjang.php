<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class keranjang extends Model
{
  protected $fillable = [
    'quantity','total_price','id_barang',
];

/**
 * The attributes that should be hidden for arrays.
 *
 * @var array
 */
protected $hidden = [
    'password', 'remember_token',
];
    public function Barang()
    {
      return $this->hasMany(Barang::class);
    }
}
