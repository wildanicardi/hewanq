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
        return response()->json($service);
        
    }

    public function createService(Request $request, $id){
        $user = User::find($id);
        $catering = User::where('role' , 'penjual,dokter')->get(); 
        $request->validate([
            'shop_name'      => 'required',
            'address'     => 'required',
            'open_at'  => 'required',
            'facility'  => 'required'
        ]);

        $service = new service;
            $service->shop_name = $request->shop_name;
            $service->address = $request->address;
            $service->open_at = $request->open_at;
            $service->facility = $request->facility;
            $service->id_user = $id;
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
            'shop_name'      => 'required',
            'address'     => 'required',
            'open_at'  => 'required',
            'facility'  => 'required'
        ]);

        $service = Service::find($id)->update([
            "shop_name" => $request->shop_name,
            "address" => $request->address,
            "open_at" => $request->open_at,
            "facility" => $request->facility
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
