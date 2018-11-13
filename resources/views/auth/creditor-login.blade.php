@extends('layouts.creditor-admin-login')

@section('content')
<form method="POST" action="{{ route('creditor.login.submit') }}">
    @csrf

    <div class="form-group row">

        <div class="col-md-8 offset-md-2">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">

        <div class="col-md-8 offset-md-2">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-4 offset-md-4">
            <button type="submit" class="btn btn-primary col-md-12">
                {{ __('Login') }}
            </button>
        </div>
    </div>
</form>
@endsection