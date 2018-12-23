<?php

namespace App\Http\Controllers;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Gate::allows('isAdmin')){
            Auth::logout();
            return redirect()->back()->with('alert', 'Akun Tidak Terdaftar!');
         }else{
            $user = User::orderby('id','ASC')->get();
            return view('/admin',compact('user'));
         }
        
    }
}
