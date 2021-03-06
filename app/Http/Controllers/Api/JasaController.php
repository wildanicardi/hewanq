<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\User;
use Validator;
class JasaController extends Controller
{
    //api android
    public function service(Service $service)
    {
        $service = $service->all();
        return response()->json([
           'service' => $service
        ]);
        
    }
    public function services($id)
    {
        $service = Barang::find($id);
        $user = User::find($service->id_user);
        return response()->json([
        'user' => $user->name,
         'service' => $service,
        ]);
        
    }
    public function index($id)
    {
        $service = Service::where('user_id',$id)->get();
        return response()->json([
           'service' => $service
        ]);
        
    }

    public function createService(Request $request, $id){
        $user = User::find($id);
        $service = User::where('role_id' , 3)->get(); 
        $request->validate([
            'name'      => 'required',
            'alamat'     => 'required',
            'Hewan_dilayani'  => 'required',
            'deskripsi'  => 'required'
        ]);

        $service = new service;
            $service->name = $request->name;
            $service->alamat = $request->alamat;
            $service->Hewan_dilayani = $request->Hewan_dilayani;
            $service->kota = $request->kota;
            $service->hari_buka = $request->hari_buka;
            $service->harga = $request->harga;
            $service->jam_buka = $request->jam_buka;
            $service->deskripsi = $request->deskripsi;
            $service->user_id = $id;
            if($request->hasFile('photo')){
                $service->photo = $request->file('photo')->getClientOriginalName();
                $foto = $request->file('photo');
                $namaFoto = $foto->getClientOriginalName();
                $path = $foto->move(public_path('/images'), $namaFoto);
            }

        $service->save();
        return response()->json([
            'message' => 'berhasil dibuat'
        ]);
    }
    public function editService($id){
        $service = Service::find($id);
        return response()->json($service);
    }

    public function updateService(Request $request, $id)
    {
        $request->validate([
            'name'      => 'required',
            'alamat'     => 'required',
            'Hewan_dilayani'  => 'required',
            'deskripsi'  => 'required'
        ]);

        $service = Service::find($id)->update([
            "name" => $request->name,
            "alamat" => $request->alamat,
            "kota" => $request->kota,
            "Hewan_dilayani" => $request->Hewan_dilayani,
            "alamat" => $request->alamat,
            "hari_buka" => $request->hari_buka,
            "jam_buka" => $request->jam_buka,
            "photo" => $request->photo,
            "deskripsi" => $request->deskripsi,
            "harga" => $request->harga,
        ]);

        return response()->json([
            'message' => 'berhasil diupdate'
        ]);
    }
    public function destroy($id)
    {
      $result = Service::find($id);
      $result->forceDelete();

      return response()->json([
        'message' => 'berhasil dihapus'
    ]);
    }
}
