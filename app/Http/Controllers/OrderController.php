<?php

namespace App\Http\Controllers;
use App\Barang;
use App\User;
use App\Order;
use App\Keranjang;
use Validator;
use Session;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function detailOrder(Request $request,$id){
        $barang = Barang::find($id);
        $order = new Order();
        $order->id_user = $id_user;
        $order->catatan = $request->catatan;
        $order->total = $request->total;
        $order->tanggal = $request->tanggal;
        $order->status_bayar = $request->status_bayar;
        $order->status_selesai = $request->status_selesai;

    }
}
