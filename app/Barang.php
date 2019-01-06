<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','id_user', 'deskripsi_barang','kota','alamat','photo','stock','size','ukuran','jenis_hewan','gender','tgl_lahir','riwayat_kesehatan','jenis',
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
    public function keranjang()
    {
      return $this->belongsTo(Keranjang::class);
    }
    public function getUser(){
      return $this->hasOne('App\user','id','id_user');
    }
}
