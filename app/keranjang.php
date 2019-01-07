<?php

namespace App;

class keranjang 
{

    public $items = null;
    public $totalQty =0;
    public $totalPrice=0;

    public function __construct($cart)
    {
      if ($cart) {
        $this->items = $cart->items;
        $this->totalQty = $cart->totalQty;
        $this->totalPrice = $cart->totalPrice;
      }
    }
    public function add($items,$id)
    {
      $storedItem= ['quantity' => 0 ,'price' =>$items['price'] , 'item' => $items];
      if ($this->items) {
        if (array_key_exists($id,$this->items)) {
          $storedItem = $this->items[$id];
        }
      }
      $storedItem['quantity']++;
      $storedItem['price'] =$items['price'] * $storedItem['quantity'];
      $this->items[$id] = $storedItem;
      $this->totalQty++;
      $this->totalPrice += $items['price'];
    }
}
