@extends('layouts.master')

@section('title', 'Service')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/admin/admin/service/'.$data->id) }}" aria-label="{{ __('Form') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="shop_name" class="col-md-4 col-form-label text-md-right">{{ __('Shop Name') }}</label>

                            <div class="col-md-6">
                                <input id="shop_name" type="text" class="form-control{{ $errors->has('shop_name') ? ' is-invalid' : '' }}" name="shop_name" value="{{ $data->shop_name }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                            <textarea name="address" id="address" cols="30" rows="10" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"  required autofocus>{{ $data->address }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="open_at" class="col-md-4 col-form-label text-md-right">{{ __('open_at') }}</label>

                            <div class="col-md-6">
                                <input id="open_at" type="text" class="form-control{{ $errors->has('open_at') ? ' is-invalid' : '' }}" name="open_at" value="{{ $data->open_at}}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="facility" class="col-md-4 col-form-label text-md-right">{{ __('Facility') }}</label>

                            <div class="col-md-6">
                            <textarea name="facility" id="facility" cols="30" rows="10" class="form-control{{ $errors->has('facility') ? ' is-invalid' : '' }}"  required autofocus>{{ $data->facility }}</textarea>
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
