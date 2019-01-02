<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','jenis_kelamin','alamat','phone', 'kota','password','photo','api_token','deskripsi','hewan_dilayani','fasilitas','favorite_pet','role_id',
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
    public function Article()
    {
      return $this->hasMany(Article::class);
    }
    public function Service()
    {
      return $this->hasMany(Service::class);
    }
    public function Role()
    {
      return $this->hasMany(Role::class);
    }
}
