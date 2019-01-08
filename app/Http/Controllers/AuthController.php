<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Auth;
class AuthController extends Controller
{
    public function registerAdmin(Request $request,User $user)
    {
        
        $this->validate($request,[
            'name'      => 'required|string|max:191',
            'email'     => 'required|email|max:191|unique:users',
            'password'  => 'required|min:6',
        ]);
        $users = new User;
        $users->name   = $request->name;
        $users->email   = $request->email;
        $users->role_id    = 1;
        $users->alamat    = $request->alamat;
        $users->jenis_kelamin    = $request->jenis_kelamin;
        $users->phone    = $request->phone;
        $users->password  =bcrypt($request->password);
        $users->api_token =bcrypt($request->email);
        if($request->hasFile('photo')){
                $users->photo = $request->file('photo')->getClientOriginalName();
                $foto = $request->file('photo');
                $namaFoto = $foto->getClientOriginalName();
                $path = $foto->move(public_path('/images'), $namaFoto);
        }
        $users->save();
        return response()->json([
            'user' => $users
        ]);
        
    }
    public function login(Request $request,User $user)
    {
        if (!Auth::attempt(['email' =>$request->email,'password' => $request->password])) {
            return response()->json(['error'=>'Your credential is wrong'],401);
        }
        $users = $user->find(Auth::user()->id);

        return $users;
    }



}
