<?php

namespace App\Http\Controllers;
use App\Barang;
use App\User;
use App\Keranjang;
use Validator;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
   public function index(Keranjang $keranjang)
   {
        $keranjang = $keranjang->all();

        return response()->json($keranjang);
        
   }
   public function store(Request $request,$id)
    {
        $id = Barang::get('id_user');
        $barang = Barang::get('price');
        $duplicates = Keranjang::search(function ($KeranjangItem,$idbarang) use ($request) {
            return $KeranjangItem->id_cart === $request->id_cart;
        });

        if (!$duplicates->isEmpty()) {
            return response()->json([
                'message' => 'item telah d tambahkan'
            ]);
        }
            $keranjang = new Keranjang;
            $keranjang->quantity = $request->quantity;
            $keranjang->total_price = $keranjang->quantity * $barang;
            $keranjang->id_barang = $idbarang;
            $keranjang->save();
            return response()->json([
                'message' => 'berhasil dibuat'
            ]);
    }
}
