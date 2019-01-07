<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function getUser()
    {
        return $this->hasOne('App\User', 'id', 'id_user');
    }

    public function getOrderItems()
    {
        return $this->hasMany('App\OrderItem', 'orders_id', 'id');
    }
}
