@extends('layouts.auth-master')

@section('content')
<div class="card ">
  <div class="card-header"><h4>Login</h4></div>

  @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif

  <div class="card-body">
    <form action=" {{ route('login.submit') }} " method="POST">
        @csrf
      <div class="form-group">
        <label for="email">Email</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"  name="email"  value="{{ old('email') }}">
        <div class="invalid-feedback">
          {{ $errors->first('email') }}
        </div>
      </div>

      <div class="form-group">
        <div class="d-block">
            <label for="password" class="control-label">Password</label>
          <div class="float-right">
            <a href="" class="text-small">
              Forgot Password?
            </a>
          </div>
        </div>
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}"  name="password">
        <div class="invalid-feedback">
          {{ $errors->first('password') }}
        </div>
        
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
          Login
        </button>
      </div>
    </form>
  </div>
</div>
<div class="mt-5 text-muted text-center">
  Login? <a href=" {{ route('register.form')}} ">Register</a>
 </div>
@endsection
