@extends('layouts.blog')

@section('title')
RC Blog
@endsection

<style>
  h1 {
    text-align: left !important;
  }

  h1 #title {
    font-size: 55px !important;
  }

  h1 #subtitle {
    font-size: 30px !important;
    font-weight: 600 !important;
  }

  #author {
    text-align: left !important;
    font-size: 20px !important;
    font-weight: 300 !important;
    font-family: Lora, 'Times New Roman', serif !important;
    font-style: italic !important;
  }

  img {
    display: block;
    width: 100%;
  }
</style>

@section('heading-image')
{{ asset($post->headingImage) }}
@endsection

@section('heading-title')
<span id="title">
  {{ $post->title }}
</span>
<br>
<span id="subtitle">
  {{ $post->description }}
</span>
@endsection

@section('heading-subtitle')
<span id="author">

  @lang('Posted By') {{ $post->author->name }}
</span>
@endsection

@section('content')
<div class="col-lg-8 col-md-10 mx-auto">
  {!! $post->content !!}
  <p>
    @lang('Category'):
    <a target="_blank" href="{{ route('blog.categories.posts', $post->category) }}">
      {{ $post->category->name }}
    </a>
  </p>
</div>
@endsection
