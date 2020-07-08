@extends('layouts.blog')

@section('title')
RC Blog
@endsection

@section('heading-image')
{{ asset('img/home-bg.jpg')}}
@endsection

@section('heading-title')
@lang('Awesome Blog')
@endsection

@section('heading-subtitle')
@lang('A brilliant way to keep yourself up to date')
@endsection

@section('content')
<div class="col-lg-8 col-md-10 mx-auto">
  @foreach ($posts as $post)
  <div class="post-preview">
      <h2 class="post-title">
        {{ $post->title }}
      </h2>
      <h3 class="post-subtitle">
        {{ $post->description }}
      </h3>
    </a>
    <p class="post-meta">@lang('Posted By')
      {{ $post->author->name }}
    </p>
  </div>
  <hr>
  @endforeach

  {{ $posts->links() }}

</div>
@endsection
