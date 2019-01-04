@extends('layouts.master')

@section('title', 'Service')


@section('content')
<!-- <a class="btn btn-primary" href="{{route('service.form')}}" style="margin-bottom: 15px;">Create New</a> -->
    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="padding-left: 15px;">No</th>
            <th>Name</th>
            <th>Alamat</th>
            <th>Buka </th>
            <th>Fasilitas</th>
            <th>Harga</th>
            <th width="110px;">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($services as $service)
             <tr>
                 <td style="padding-left: 15px;">{!! $service->id !!}</td>
                 <td>{!! $service->name !!}</td>
                 <td>{!! $service->alamat !!}</td>
                 <td>{!! $service->jam_buka !!}</td>
                 <td>{!! $service->deskripsi !!}</td>
                 <td>{!! $service->harga !!}</td>
                 <td>
                 <form action="/admin/admin/service/{!! $service->id !!}" method="post" id="form_aksi">
                        <a href="/admin/admin/service/{!! $service->id !!}/edit" class="btn btn-success"><i class="fa fa-pencil"></i>edit</a>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o"  onclick="return confirm('Are you sure?')"> </i>DELETE</button>
                 </form>
                 </td>
             </tr>
        @endforeach
        </tbody>
    </table>
@stop