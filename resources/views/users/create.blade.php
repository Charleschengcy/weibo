@extends('layouts.default')
@section('title', 'Signup')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="card">
    <div class="card-header">
      <h5>Sign up</h5>
    </div>
    <div class="card-body">
      <form method="POST" action="{{ route('users.store')}}">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="name">Name: </label>
          <input type="text" name="name" class="form-control" value="{{old('name')}}">
        </div>

        <div class="form-group">
          <label for="email">Email: </label>
          <input type="text" name="name" class="form-control" value="{{old('email')}}">
        </div>

        <div class="form-group">
          <label for="password">Password: </label>
          <input type="text" name="name" class="form-control" value="{{old('password')}}">
        </div>

        <div class="form-group">
          <label for="password_confirmation">Password confirmation: </label>
          <input type="text" name="name" class="form-control" value="{{old('password_confirmation')}}">
        </div>

        <button type=submit class="btn btn-primary">Sign up</button>
      </form>
    </div>
  </div>
</div>
@stop
