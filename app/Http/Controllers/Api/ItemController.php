<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Barang;
use App\User;
use Validator;

class ItemController extends Controller
{
    //api android
    public function index($id)
    {
        $item = Barang::where('id_user',$id)->get();
        return response()->json([
           'item' => $item
        ]);
        
    }
    public function item(Barang $item)
    {
        $item = $item->where('jenis','item')->get();

        return response()->json([
        'item' => $item
        ]);
        
    }

    public function buatItem(Request $request, $id){
        $user = User::find($id);
        $item = User::where('role_id' , 3)->get(); 
        $request->validate([
            'name'      => 'required',
            'deskripsi_barang' => 'required',
        ]);

        $item = new Barang;
            $item->name = $request->name;
            $item->deskripsi_barang = $request->deskripsi_barang;
            $item->kota = $request->kota;
            $item->alamat = $request->price;
            $item->stock = $request->stock;
            $item->price = $request->price;
            $item->ukuran = $request->ukuran;
            $item->size = $request->size;
            $item->id_user = $id;
            $item->jenis='item';
            if($request->hasFile('photo')){
                $item->photo = $request->file('photo')->getClientOriginalName();
                $foto = $request->file('photo');
                $namaFoto = $foto->getClientOriginalName();
                $path = $foto->move(public_path('/images'), $namaFoto);
    
            }

        $item->save();
        return response()->json([
            'message' => 'berhasil dibuat'
        ]);
    }
    public function editItem($id){
        $item = Barang::find($id);
        return response()->json($item);
    }

    public function updateItem(Request $request, $id)
    {
        $request->validate([
            'name'      => 'required',
            'jenis_barang' => 'required',
        ]);

        $item = Barang::find($id)->update([
            "name" => $request->name,
            "deskripsi_barang" => $request->deskripsi_barang,
            "photo" => $request->photo,
            "kota" => $request->kota,
            "alamat" => $request->alamat,
            "stock" => $request->stock,
            "size" => $request->size,
            "ukuran" => $request->ukuran
        ]);

        return response()->json([
            'message' => 'berhasil diupdate'
        ]);
    }
    public function destroy($id)
    {
      $result = Barang::find($id);
      $result->forceDelete();

      return response()->json([
        'message' => 'berhasil dihapus'
    ]);
    }
}
