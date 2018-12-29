@extends('layouts.master')

@section('title', 'items')


@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="padding-left: 15px;">No</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Description</th>
            <th>Stock</th>
            <th>size</th>
            <th>ukuran</th>
            <th>Price</th>
            <th width="110px;">Action</th>
        </tr>
        </thead>
        <tbody>
        @php($i=1)
        @foreach($items as $item)
             <tr>
                 <td style="padding-left: 15px;">{!! $i !!}</td>
                 <td><img src="/images/{!!$item->photo !!}" alt=""></td>
                 <td>{!! $item->name !!}</td>
                 <td>{!! $item->jenis_barang !!}</td>
                 <td>{!! $item->stock !!}</td>
                 <td>{!! $item->size !!}</td>
                 <td>{!! $item->ukuran !!}</td>
                 <td>{!! $item->price !!}</td>
                 <td>
                 <form action="/admin/admin/item/{!! $item->id !!}" method="post" id="form_aksi">
                        <a href="/admin/admin/item/{!! $item->id !!}/edit" class="btn btn-success"><i class="fa fa-pencil"></i>edit</a>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o"  onclick="return confirm('Are you sure?')"> </i>DELETE</button>
                 </form>
                 </td>
             </tr>
            @php($i++)
        @endforeach
        </tbody>
        </tbody>
    </table>
@stop