<?php

namespace App\Http\Controllers;
use App\Barang;
use App\Keranjang;
use App\User;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::orderby('id','ASC')->get();
        return view('barang.list',compact('barangs'));
    }
    // fucntion untuk items
    public function indexItems()
    {
        $items = Barang::orderby('id','ASC')->where('jenis', 'item')->get();
        return view('items.list',compact('items'));
    }

    //pet
    public function indexPet()
    {
       $users = User::where('role_id',3)->get();
        $pets = Barang::orderby('id','ASC')->where('jenis', 'pet')->get();
        return view('pets.list',compact('pets','users'));
    }
    //api android
    public function barangs($id)
    {
        $barang = Barang::find($id);
        $user = User::find($barang->id_user);
        return response()->json([
        'user' => $user->name,
         'barang' => $barang,
        ]);
        
    }
    public function barangku($id)
    {
        $barang = Barang::where('id_user',$id)->get();
        return response()->json([
          'barang' =>$barang
        ]);
        
    }
    public function getAddToCart(Request $request,$id)
    {
        $barang = Barang::find($id);
        $cart = Session::has('keranjang') ? Session::get('keranjang') : null;
        $keranjang = new Keranjang($cart);
        $keranjang->add($barang,$barang['id']);
        $request->session()->put('keranjang',$keranjang);
        return response()->json([
            'keranjang' =>$keranjang
          ]);
    }
}
