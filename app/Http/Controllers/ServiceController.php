<?php

namespace App\Http\Controllers;
use App\Service;
use App\User;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderby('id','ASC')->get();
        return view('services.list',compact('services'));
    }
    public function form()
    {
        return view('services.form');
    }
    public function store(Request $request)
    {
      	$req = $request->all();

        $result = Service::create($req);

        return redirect('/admin/admin/service');
    }
    public function edit($id)
    {
      $data['data'] = Service::find($id);

      return view('services.edit', $data);
    }

    public function update($id, Request $request)
    {
      	$req = $request->except('_method', '_token', 'submit');

        $result = Service::where('id', $id)->update($req);

        return redirect('/admin/admin/service');
    }
    public function destroy($id)
    {
      Service::find($id)->delete();

      return redirect('/admin/admin/service');
    }
    
  
}
