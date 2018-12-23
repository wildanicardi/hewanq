@extends('layouts.master')

@section('title', 'Doktor')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/admin/admin/article/'.$data->id) }}" aria-label="{{ __('Form') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $data->title }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="value" class="col-md-4 col-form-label text-md-right">{{ __('Value') }}</label>

                            <div class="col-md-6">
                                <textarea name="value" id="value" cols="30" rows="10" class="form-control{{ $errors->has('value') ? ' is-invalid' : '' }}"  required autofocus>{{  $data->value }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>

                            <div class="col-md-6">
                               <!-- <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus> -->
                               <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" value="create" style="margin-bottom: 15px;">Submit</button>
                                {{csrf_field()}}
		                        <input type="hidden" name="_method" value="PUT">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
