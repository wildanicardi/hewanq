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
    // respons api
    public function barangs(Barang $barang)
    {
        $barang = $barang->all();

        return response()->json($barang);
        
    }
    public function show(Barang $barang)
    {
        $barang = $barang->find(barang()->id_barang);

        return $barang;
    }
    // public function create(Request $request,Barang $barang)
    // {
    //     $this->validate($request,[
    //         'name'          => 'required|string|max:191',
    //         'jenis_barang'     => 'required|string',
    //         'stock'          => 'required|integer',
    //         'price'         => 'required|integer'
    //     ]);
    //     $barangs = $barang->create([
    //         'name'      => $request->name,
    //         'jenis_barang'     => $request->jenis_barang,
    //         'stock'     => $request->stock,
    //         'price'     => $request->price,

    //     ]);
    //     return $barangs;
        
    // }
    public function store(Request $request)
    {
      	$req = $request->all();

        $result = Barang::create($req);

        return $result;
    }
    public function destroy($id)
    {
      Barang::find($id)->delete();

      return redirect('/admin/admin/item');
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
        $pets = Barang::orderby('id','ASC')->where('jenis', 'pet')->get();
        return view('pets.list',compact('pets'));
    }
}
