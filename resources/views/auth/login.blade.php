@extends('main')
@section('title','| Login')
@section('content')
<h2 class="title">Login</h2>
<form method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <div class="{{ $errors->has('email') ? ' has-error' : '' }} input-field">
        <input id="email" type="email" class="darken-4" name="email" value="{{ old('email') }}" autofocus>
        <label for="email" class="darken-4">E-Mail Address</label>
    </div>
    <div class="{{ $errors->has('password') ? ' has-error' : '' }} input-field">
        <input id="password" type="password" class="darken-4" name="password" required>
        <label for="password" class="darken-4">Password</label>
    </div>
    <input type="checkbox"  id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}/>
    <label for="remember">Remember me</label>
    <a class="bottomDiv" href="{{ route('password.request') }}">
        Forgot Your Password?
    </a>
    <button type="submit" class="btn btn-primary right inline spaceBottom">
        Login
    </button>
</form>
@endsection
