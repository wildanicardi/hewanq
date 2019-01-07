<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function getOrder()
    {
        return $this->hasOne('App\Order', 'id', 'orders_id');
    }

    public  function  getBarang()
    {
        return $this->hasOne('App\Barang','id','id_barang');
    }
}
