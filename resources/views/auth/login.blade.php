@extends('layouts.admin')

@section('content')

<div class="col-md-8">
  <div class="card">
    <div class="card-header">
      <h4 class="text-center m-0">{{ __('Login') }}</h4>
    </div>

    <div class="card-body">
      <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
          <label for="email">{{ __('Email') }}</label>
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autocomplete="email" autofocus>

          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror

        </div>

        <div class="form-group">
          <label for="password">{{ __('Password') }}</label>
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password" required autocomplete="current-password">
          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror

        </div>

        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember"
              {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
              {{ __('Remember me') }}
            </label>
          </div>
        </div>

        <div class="form-group">

          <button type="submit" class="btn btn-primary btn-block w-100">
            {{ __('Login') }}
          </button>
        </div>

      </form>
    </div>
  </div>
</div>

@endsection
