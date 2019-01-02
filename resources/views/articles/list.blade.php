@extends('layouts.master')

@section('title', 'Tips & Trik')


@section('content')
<a class="btn btn-primary" href="{{route('article.form')}}" style="margin-bottom: 15px;">Create New</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="padding-left: 15px;">No</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Description</th>
            <th width="110px;">Action</th>
        </tr>
        </thead>
        <tbody>
        @php($i=1)
        @foreach($articles as $article)
             <tr>
                 <td style="padding-left: 15px;">{!! $i !!}</td>
                 <td><img  src="/images/{{$article->photo}}" alt=""></td>
                 <td>{!! $article->judul !!}</td>
                 <td>{!! $article->isi !!}</td>
                 <td>
                 <form action="/admin/admin/article/{!! $article->id !!}" method="post" id="form_aksi">
                        <a href="/admin/admin/article/{!! $article->id !!}/edit" class="btn btn-success"><i class="fa fa-pencil"></i>edit</a>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o"  onclick="return confirm('Are you sure?')"> </i>DELETE</button>
                 </form> 
                 </td>
             </tr>
             @php($i++)
        @endforeach
        </tbody>
    </table>
@stop