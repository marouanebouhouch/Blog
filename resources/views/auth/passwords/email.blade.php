@extends('main')
@section('title','| Reset password')
@section('content')
<h2 class="title">Reset Password</h2>
<div class="panel-body">
<form method="POST" action="{{ route('password.email') }}">
    {{ csrf_field() }}
    <div class="{{ $errors->has('email') ? ' has-error' : '' }} input-field">
        <input id="email" type="email" class="darken-4" name="email" value="{{ old('email') }}" required autofocus>
        <label for="email" class="darken-4">E-Mail Address</label>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <button type="submit" class="btn btn-primary right spaceBottom">
        Send Password Reset Link
    </button>
</form>
</div>

@endsection
