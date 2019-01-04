<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'Hewan_dilayani','kota','alamat','hari_buka','user_id','jam_buka','photo','deskripsi','harga',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
