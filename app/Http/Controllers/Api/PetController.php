<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Barang;
use App\User;
use Validator;

class PetController extends Controller
{
     //api android
     public function index($id)
    {
        $pet = Barang::where('id_user',$id)->get();
        return response()->json([
           'pet' => $pet
        ]);
        
    }
     public function pet(Barang $pet)
     {
       
         $pet = $pet->where('jenis','pet')->get();
 
         return response()->json([
            'pet' => $pet
        ]);
         
     }
 
     public function createPet(Request $request, $id){
        $user = User::find($id);
        $pet = User::where('role_id' , 3)->get(); 
         $request->validate([
             'name'      => 'required',
             'deskripsi_barang' => 'required',
         ]);
 
         $pet = new Barang;
            $pet->id_user = $id;
             $pet->name = $request->name;
             $pet->deskripsi_barang = $request->deskripsi_barang;
             $pet->stock = $request->stock;
             $pet->kota = $request->kota;
             $pet->alamat = $request->alamat;
             $pet->price = $request->price;
             $pet->jenis_hewan = $request->jenis_hewan;
             $pet->gender = $request->gender;
             $pet->tgl_lahir = $request->tgl_lahir;
             $pet->jenis='pet';
             $pet->riwayat_kesehatan = $request->riwayat_kesehatan;
             if($request->hasFile('photo')){
                $pet->photo = $request->file('photo')->getClientOriginalName();
                 $foto = $request->file('photo');
                 $namaFoto = $foto->getClientOriginalName();
                 $path = $foto->move(public_path('/images'), $namaFoto);
     
             }
 
         $pet->save();
         return response()->json([
             'message' => 'berhasil dibuat'
         ]);
     }
     public function editPet($id){
         $pet = Barang::find($id);
         return response()->json($pet);
     }
 
     public function updatePet(Request $request, $id)
     {
         $request->validate([
            'name'      => 'required',
            'deskripsi_barang' => 'required',
         ]);
 
         $pet = Barang::find($id)->update([
            "name" => $request->name,
            "deskripsi_barang" => $request->deskripsi_barang,
            "photo" => $request->photo,
            "kota" => $request->kota,
            "alamat" => $request->alamat,
            "stock" => $request->stock,
            "price" => $request->price,
            "jenis_hewan" => $request->jenis_hewan,
            "gender" => $request->gender,
            "tgl_lahir" => $request->tgl_lahir,
            "riwayat_kesehatan" => $request->riwayat_kesehatan

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
