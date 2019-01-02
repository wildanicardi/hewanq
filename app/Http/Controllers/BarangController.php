<?php

namespace App\Http\Controllers;
use App\Barang;
use App\User;
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
}
