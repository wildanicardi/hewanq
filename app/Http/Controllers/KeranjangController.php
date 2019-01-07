<?php

namespace App\Http\Controllers;
use App\Barang;
use App\User;
use App\Keranjang;
use Validator;
use Session;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
   public function index(Keranjang $keranjang)
   {
        $keranjang = $keranjang->all();

        return response()->json($keranjang);
        
   }
   public function getCart()
   {
       if (!Session::has('keranjang')) {
           return response()->json([
               'message' => 'keranjang kosong'
           ]);
       }
       $cart = Session::get('keranjang');
       $keranjang = new Keranjang($cart);
       return response()->json([
        'products' => $keranjang->items,
        'total harga' => $keranjang->totalPrice,
    ]);
   }
}
