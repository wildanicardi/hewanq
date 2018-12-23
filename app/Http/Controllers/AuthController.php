<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
        $users = $user->create([
            'name'      => $request->name,
            'email'     => $request->email,
            'photo'     => $request->photo,
            'address'     => $request->address,
            'gender'    => $request->gender,
            'phone'     => $request->phone,
            'password'  =>bcrypt($request->password),
            'api_token' =>bcrypt($request->email)
        ]);
        return $users;
        
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
