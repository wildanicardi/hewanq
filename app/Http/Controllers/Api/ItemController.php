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
    public function item(Barang $item)
    {
        $item = $item->where('jenis','item')->get();

        return response()->json($item);
        
    }

    public function buatItem(Request $request, $id){
        $user = User::find($id);
        $item = User::where('role' , 'penjual,dokter')->get(); 
        $request->validate([
            'name'      => 'required',
            'jenis_barang' => 'required',
        ]);

        $item = new Barang;
            $item->name = $request->name;
            $item->jenis_barang = $request->jenis_barang;
            $item->stock = $request->stock;
            $item->price = $request->price;
            $item->size = $request->size;
            $item->ukuran = $request->ukuran;
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
            "jenis_barang" => $request->jenis_barang,
            "photo" => $request->photo,
            "stock" => $request->stock,
            "price" => $request->price,
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
