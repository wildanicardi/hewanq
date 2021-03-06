<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $fillable = [
        'nama_role','id_user', 
    ];

    public function keranjang()
    {
      return $this->belongsTo(Keranjang::class);
    }
    public function users()
    {
      return $this->hasMany(Users::class);
    }
}
