@extends('layouts.blog')

@section('title')
Blog
@endsection

@section('heading-image')
{{ asset('img/about-bg.jpg')}}
@endsection

@section('heading-title')
@lang('About Me')
@endsection


@section('content')
<div class="col-lg-8 col-md-10 mx-auto">
  <p>@lang('A Software Developer that loves apply his knowledge to solve problems, create powerful products and impact business/lives.')
  </p>
  <p>@lang('I love to travel, meet new people and places. Beyond that, I also love to play video games.')</p>
</div>
@endsection
