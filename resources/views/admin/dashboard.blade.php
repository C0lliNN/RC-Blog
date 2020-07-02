@extends('layouts.admin')

@section('content')

@include('admin.sidebar')

<div class="col-md-8 mt-3 mt-md-0">
  <div class="card">
    <div class="card-header">
      <h4 class="text-center m-0">{{ __('Dashboard') }}</h4>
    </div>

    <div class="card-body">
      <p>@lang('Welcome'), {{ Auth::user()->name }}!</p>
      <p><strong>@lang('Categories'):</strong> {{ $categories->count() }}</p>
      <p><strong>@lang('Posts'):</strong> {{ $posts->count() }}</p>
    </div>
  </div>
</div>

@endsection
