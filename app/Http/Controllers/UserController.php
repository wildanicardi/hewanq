<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Auth;
class UserController extends Controller
{
    //web 
    public function form()
    {
        $data = new User();
        $roleOption=Role::all(); 
        $params = [
            'data' =>$data,
            'roleOption'=>$roleOption
        ];
        return view('auth.user.form',$params);
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
        $users->role_id    = $request->role_id;
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
        return redirect('/admin/admin');
    }
    public function editAkun($id)
    {
      $data = User::find($id);
      $roleOption=Role::all(); 
      $params = [
          'data' =>$data,
          'roleOption'=>$roleOption
      ];
      return view('auth.user.edit', $params);
    }

    public function updateAkun($id, Request $request)
    {
      	$req = $request->except('_method', '_token', 'submit');

        $result = User::where('id', $id)->update($req);
        $role_id  = $req['role_id'];
        Role::find($role_id);
        try{
            return redirect('/admin/admin');
        } catch (\Exception $ex){
            return "<div class='alert alert-danger'>Terjadi kesalahan! Peran gagal disimpan!</div>";
        }
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

        return response()->json([
         'user' => $users
        ]);
    }
    public function profile(User $user)
    {
        $user = $user->find(Auth::user()->id);

        return response()->json([
            'user' => $users
        ]);
    }
    public function show()
    {
        $users = user::all();
    }
    public function detailUser($id)
    {
        $user = User::find($id);
        
        return response()->json([
            'user' => $user,
          ]);

    }
    //fucntion dokter
    public function detailDokter($id)
    {
        $dokter = User::find($id);
        
        return response()->json([
            'dokter' => $dokter,
          ]);

    }
    public function indexDokter()
    {
        $doctors = User::all()->where('role_id',4);
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
            'alamat'     => $request->alamat,
            'jenis_kelamin'    => $request->jenis_kelamin,
            'hewan_dilayani'    => $request->hewan_dilayani,
            'fasilitas'    => $request->fasilitas,
            'kota'     => $request->kota,
            'password'  =>bcrypt($request->password),
            'role_id'      =>4,
            'api_token' =>bcrypt($request->email)
        ]);
        return redirect('/admin/admin/doctor');
        
    }
    //api android
    public function doctors(User $dokter)
    {

        $dokter = $dokter->where('role_id',4)->get();
        return response()->json([
            'dokter' =>  $dokter
        ]);
        
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
            'alamat'     => $request->alamat,
            'kota'     => $request->kota,
            'jenis_kelamin'    => $request->jenis_kelamin,
            'phone'     => $request->phone,
            'deskripsi' => $request->deskripsi,
            'password'  =>bcrypt($request->password),
            'role_id'      =>3,
            'api_token' =>bcrypt($request->email)
        ]);
        return response()->json($penjual);
    }
    public function edit($id){
        $user = User::find($id);

        return response()->json([
            'message' => 'berhasil diupdate'
        ]);
    }
    public function update(Request $request, $id)
    {
        $service = Service::find($id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "kota" => $request->kota,
            "alamat" => $request->alamat,
            "alamat" => $request->alamat,
            "deskripsi" => $request->deskripsi,
            "photo" => $request->photo,
            "deskripsi" => $request->deskripsi,
            'role_id' =>$request->role_id,
        ]);

        return response()->json([
            'message' => 'berhasil diupdate'
        ]);
    }
    public function createDokter(Request $request,User $user)
    {
        $this->validate($request,[
            'name'      => 'required|string|max:191',
            'email'     => 'required|email|max:191|unique:users',
            'password'  => 'required|min:6',
        ]);
        $dokter = $user->create([
            'name'      => $request->name,
            'email'     => $request->email,
            'photo'     => $request->photo,
            'alamat'     => $request->alamat,
            "kota"          => $request->kota,
            'jenis_kelamin'    => $request->jenis_kelamin,
            'phone'     => $request->phone,
            'hewan_dilayani' => $request->hewan_dilayani,
            'fasilitas' => $request->fasilitas,
            'deskripsi' => $request->deskripsi,
            'password'  =>bcrypt($request->password),
            'role_id'      =>4,
            'api_token' =>bcrypt($request->email)
        ]);
        return response()->json([
           'dokter' => $dokter
        ]);
    }

}   
