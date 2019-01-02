@extends('layouts.master')

@section('title', 'Doktor')


@section('content')
<!-- <a class="btn btn-primary" href="{{route('doctors.form')}}" style="margin-bottom: 15px;">Create New</a> -->
    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="padding-left: 15px;">No</th>
            <th>Name</th>
            <th>email</th>
            <th>gender</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Pet</th>
            <th>Facility</th>
            <th>Photo</th>
        </tr>
        </thead>
        <tbody>
        
        @php($i=1)
        @foreach($doctors as $doctor)
             <tr>
                 <td style="padding-left: 15px;">{!! $i !!}</td>
                 <td>{!! $doctor->name !!}</td>
                 <td>{!! $doctor->alamat !!}</td>
                 <td>{!! $doctor->jenis_kelamin !!}</td>
                 <td>{!! $doctor->phone !!}</td>
                 <td>{!! $doctor->alamat !!}</td>
                 <td>{!! $doctor->hewan_dilayani !!}</td>
                 <td>{!! $doctor->fasilitas !!}</td>
                 <td>{!! $doctor->photo !!}</td>
             </tr>
             @php($i++)
        @endforeach
       
        </tbody>
    </table>
@stop