<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class UserController extends Controller
{
    //web 
    public function form()
    {
        return view('auth.user.form');
    }
     public function createAkun(Request $request,User $user)
    {
        $this->validate($request,[
            'name'      => 'required|string|max:191',
            'email'     => 'required|email|max:191|unique:users',
            'password'  => 'required|min:6',
        ]);
        $users = new User;
        $users->name   = $request->name;
        $users->email   = $request->email;
        $users->address    = $request->address;
        $users->gender    = $request->gender;
        $users->phone    = $request->phone;
        $users->password  =bcrypt($request->password);
        $users->role    ='admin';
        $users->api_token =bcrypt($request->email);
        if($request->hasFile('photo')){
                $users->photo = $request->file('photo')->getClientOriginalName();
                $foto = $request->file('photo');
                $namaFoto = $foto->getClientOriginalName();
                $path = $foto->move(public_path('/images'), $namaFoto);
        }
        $users->save();
        return redirect('/admin/admin');
    }
    public function editAkun($id)
    {
      $data['data'] = User::find($id);

      return view('auth.user.edit', $data);
    }

    public function updateAkun($id, Request $request)
    {
      	$req = $request->except('_method', '_token', 'submit');

        $result = User::where('id', $id)->update($req);

        return redirect('/admin/admin');
    }
    public function destroyAkun($id)
    {
      User::find($id)->delete();

      return redirect('/admin/admin');
    }
    //api android
    public function users(User $user)
    {
        $users = $user->all();

        return response()->json($users);
    }
    public function profile(User $user)
    {
        $user = $user->find(Auth::user()->id);

        return response()->json($users);
    }
    public function show()
    {
        $users = user::all();
    }
    //fucntion dokter
    public function indexDokter()
    {
        $doctors = User::orderby('id','ASC')->where('role', 'dokter')->get();
        return view('doctors.list',compact('doctors'));
    }
    public function formDokter()
    {
        return view('doctors.form');
    }
    public function store(Request $request,User $user)
    {
        $this->validate($request,[
            'name'      => 'required|string|max:191',
            'email'     => 'required|email|max:191|unique:users',
            'password'  => 'required|min:6',
        ]);
        $doctors = $user->create([
            'name'      => $request->name,
            'email'     => $request->email,
            'photo'     => $request->photo,
            'address'     => $request->address,
            'gender'    => $request->gender,
            'pet'    => $request->pet,
            'facility'    => $request->facility,
            'phone'     => $request->phone,
            'password'  =>bcrypt($request->password),
            'role'      =>'dokter',
            'api_token' =>bcrypt($request->email)
        ]);
        return redirect('/admin/admin/doctor');
        
    }
    //api android
    public function doctors(User $dokter)
    {
        $dokter = $dokter->all()->where('role','dokter');

        return response()->json($dokter);
        
    }
    public function penjual(User $penjual)
    {
        $penjual = $penjual->all()->where('role','penjual');

        return response()->json($penjual);
        
    }
    public function createPenjual(Request $request,User $user)
    {
        $this->validate($request,[
            'name'      => 'required|string|max:191',
            'email'     => 'required|email|max:191|unique:users',
            'password'  => 'required|min:6',
        ]);
        $penjual = $user->create([
            'name'      => $request->name,
            'email'     => $request->email,
            'photo'     => $request->photo,
            'address'     => $request->address,
            'gender'    => $request->gender,
            'phone'     => $request->phone,
            'deskripsi' => $request->deskripsi,
            'password'  =>bcrypt($request->password),
            'role'      =>'penjual',
            'api_token' =>bcrypt($request->email)
        ]);
        return response()->json($penjual);
    }
}   
