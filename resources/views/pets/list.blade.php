@extends('layouts.master')

@section('title', 'Pet')


@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="padding-left: 15px;">No</th>
            <th>Name</th>
            <th>Jenis Hewan</th>
            <th>Harga</th>
            <th>Gender</th>
            <th>Tanggal lahir</th>
            <th>Riwayat Kesehatan</th>
            <th>Photo</th>
            <th>Id Penjual</th>
        </tr>
        </thead>
        <tbody>
        @php($i=1)
        @foreach($pets as $pet)
             <tr>
                 <td style="padding-left: 15px;">{!! $i !!}</td>
                 <td>{!! $pet->name !!}</td>
                 <td>{!! $pet->jenis_hewan !!}</td>
                 <td>{!! $pet->price !!}</td>
                 <td>{!! $pet->gender !!}</td>
                 <td>{!! $pet->tgl_lahir !!}</td>
                 <td>{!! $pet->riwayat_kesehatan !!}</td>
                 <td>{!! $pet->photo !!}</td>
                 <td>{!! $pet->id_user !!}</td>
                 @php($i++)
        @endforeach
            </tr>
        </tbody>
    </table>
@stop