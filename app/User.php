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
        'name', 'email','gender','address','phone', 'password','photo','api_token','deskripsi','provinsi','kota','zip','pet','facility','favorite_pet',
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
}
