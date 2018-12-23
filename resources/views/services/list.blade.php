@extends('layouts.master')

@section('title', 'Service')


@section('content')
<!-- <a class="btn btn-primary" href="{{route('service.form')}}" style="margin-bottom: 15px;">Create New</a> -->
    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="padding-left: 15px;">No</th>
            <th>Shop name</th>
            <th>Address</th>
            <th>Open At</th>
            <th>Facility</th>
            <th width="110px;">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($services as $service)
             <tr>
                 <td style="padding-left: 15px;">{!! $service->id !!}</td>
                 <td>{!! $service->shop_name !!}</td>
                 <td>{!! $service->address !!}</td>
                 <td>{!! $service->open_at !!}</td>
                 <td>{!! $service->facility !!}</td>
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