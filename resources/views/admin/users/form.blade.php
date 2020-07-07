@extends('layouts.admin')

@section('content')

@include('admin.sidebar')

<div class="col-md-8 mt-3 mt-md-0">
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <h4 class="text-center m-0">@lang('New User')
      </h4>
    </div>

    <div class="card-body">
      <form action="{{route('users.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="name">@lang('Name')</label>
          <input class="form-control" type="text" id="name" name="name" placeholder="@lang('User Name')">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="@lang('User Email')">
        </div>
        <div class="form-group">
          <label for="password">@lang('Password')</label>
          <input type="password" class="form-control" id="password" name="password"
            placeholder="@lang('Enter your Password')">
        </div>
        <div class="form-group">
          <label for="confirm-passowrd">@lang('Confirm Password')</label>
          <input type="password" class="form-control" id="confirm-password" name="password_confirmation"
            placeholder="@lang('Enter your Password again')">
        </div>
        <button class="btn btn-success" type="submit">
          @lang('Create')
        </button>
      </form>
    </div>
  </div>
</div>

@endsection
