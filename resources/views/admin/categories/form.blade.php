@extends('layouts.admin')

@section('content')

@include('admin.sidebar')

<div class="col-md-8 mt-3 mt-md-0">
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <h4 class="text-center m-0">
        @if (isset($category))
        {{ __('Edit Category') }}
        @else
        {{ __('New Category') }}
        @endif
      </h4>
    </div>

    <div class="card-body">
      <form action="{{ isset($category) ? route('categories.update', $category) : route('categories.store') }}"
        method="post">
        @csrf
        @if (isset($category))
        @method('put')
        @endif
        <div class="form-group">
          <label for="name">@lang('Name')</label>
          <input class="form-control" type="text" id="name" name="name" placeholder="@lang('Category Name')"
            value={{ isset($category) ? $category->name : ''  }}>
        </div>
        <button class="btn btn-{{ isset($category) ? 'info' : 'success' }}" type="submit">
          @if (isset($category))
          @lang('Update')
          @else
          @lang('Create')
          @endif
        </button>
      </form>
    </div>
  </div>
</div>

@endsection
