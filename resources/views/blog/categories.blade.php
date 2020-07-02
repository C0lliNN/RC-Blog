@extends('layouts.blog')

@section('title')
RC Blog - @lang('Categories')
@endsection

@section('heading-image')
{{ asset('img/post-bg.jpg')}}
@endsection

@section('heading-title')
@lang('Categories')
@endsection

@section('heading-subtitle')
@lang('Checkout the categories')
@endsection

@section('content')
<div class="col-lg-8 col-md-10 mx-auto">
  <ul class="list-group">
    @foreach ($categories as $category)
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <a href="#" class="text-decoration-none">{{ $category['name'] }}</a>
      <span class="badge badge-secondary">{{ $category['posts']->count() }}</span>
    </li>
    @endforeach
  </ul>
</div>
@endsection
