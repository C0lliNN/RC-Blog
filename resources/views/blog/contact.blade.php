@extends('layouts.blog')

@section('title')
RC Blog - @lang('Contact')
@endsection

@section('heading-image')
{{ asset('img/contact-bg.jpg')}}
@endsection

@section('heading-title')
@lang('Contact Me')
@endsection

@section('heading-subtitle')
@lang('Have questions? I have answers.')
@endsection


@section('content')


<div class="col-lg-8 col-md-10 mx-auto">

  <p>@lang('Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as
    possible!')
  </p>

  @if (session()->has('alert'))

  <div class="my-3 alert alert-success alert-dismissible fade show">
    @lang(session()->get('alert'))
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif

  <form action="{{ route('blog.contact') }}" method="POST" id="contactForm" novalidate>
    @csrf
    <div class="control-group">
      <div class="form-group floating-label-form-group controls">
        <label>@lang('Name')</label>
        <input type="text" class="form-control" placeholder="@lang('Name')" name="name" id="name" required
          data-validation-required-message="Please enter your name.">
        <p class="help-block text-danger"></p>
      </div>
    </div>
    <div class="control-group">
      <div class="form-group floating-label-form-group controls">
        <label>@lang('Email Address')</label>
        <input type="email" class="form-control" placeholder="@lang('Email Address')" id="email" required
          data-validation-required-message="Please enter your email address." name="email">
        <p class="help-block text-danger"></p>
      </div>
    </div>
    <div class="control-group">
      <div class="form-group col-xs-12 floating-label-form-group controls">
        <label>@lang('Phone Number')</label>
        <input type="tel" class="form-control" placeholder="@lang('Phone Number')" id="phone" required
          data-validation-required-message="Please enter your phone number." name="phone">
        <p class="help-block text-danger"></p>
      </div>
    </div>
    <div class="control-group">
      <div class="form-group floating-label-form-group controls">
        <label>@lang('Message')</label>
        <textarea rows="5" class="form-control" placeholder="@lang('Message')" id="message" required
          data-validation-required-message="Please enter a message." name="message"></textarea>
        <p class="help-block text-danger"></p>
      </div>
    </div>
    <br>
    <div id="success"></div>
    <button type="submit" class="btn btn-primary" id="sendMessageButton">@lang('Send')</button>
  </form>
</div>
@endsection
