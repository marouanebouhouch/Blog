@extends('main')
@section('title','| Reset password')
@section('content')
<form method="POST" action="{{ route('password.request') }}">
    {{ csrf_field() }}
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="{{ $errors->has('email') ? ' has-error' : '' }} input-field">
        <label for="email" class="darken-4">E-Mail Address</label>
        <input id="email" type="email" class="darken-4" name="email" value="{{ $email or old('email') }}" required autofocus>
    </div>
    <div class="{{ $errors->has('password') ? ' has-error' : '' }} input-field">
        <label for="password" class="darken-4">Password</label>
        <input id="password" type="password" class="darken-4" name="password" required>
    </div>
    <div class="{{ $errors->has('password_confirmation') ? ' has-error' : '' }} input-field">
        <label for="password-confirm" class="darken-4">Confirm Password</label>
        <input id="password-confirm" type="password" class="darken-4" name="password_confirmation" required>
    </div>
    <button type="submit" class="btn btn-primary right inline spaceBottom">
        Reset Password
    </button>
</form>

@endsection
