@extends('main')
@section('title','| Register')
@section('content')
<h2 class="title">Register</h2>
<div class="panel-body">
    <form  method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <div class="{{ $errors->has('name') ? ' has-error' : '' }} input-field">
            <label for="name" class="darken-4">Name</label>
            <input id="name" type="text" class="darken-4" name="name" value="{{ old('name') }}" required autofocus>
        </div>
        <div class="{{ $errors->has('email') ? ' has-error' : '' }} input-field">
            <label for="email" class="darken-4">E-Mail Address</label>
            <input id="email" type="email" class="darken-4" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="{{ $errors->has('password') ? ' has-error' : '' }} input-field">
            <label for="password" class="darken-4">Password</label>
            <input id="password" type="password" class="darken-4" name="password" required>
        </div>
        <div class="input-field">
            <label for="password-confirm" class="darken-4">Confirm Password</label>
            <input id="password-confirm" type="password" class="darken-4" name="password_confirmation" required>
        </div>
        <button type="submit" class="btn btn-primary right inline spaceBottom ">
            Register
        </button>
    </form>
</div>

@endsection
