@extends('layouts.admin')

@section('content')

<style>
  .ck-editor__editable {
    height: 280px;
  }
</style>
<script src="https://unpkg.com/feather-icons"></script>

<div class="col-12 my-3 mt-md-0">
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <h4 class="text-center m-0">
        @if (isset($post))
        {{ __('Edit Post') }}
        @else
        {{ __('New Post') }}
        @endif
      </h4>
    </div>

    <div class="card-body">
      <form action="{{ isset($post) ? route('posts.update', $post) : route('posts.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @if (isset($post))
        @method('PUT')
        @endif
        <div class="form-group">
          <label for="title">@lang('Title')</label>
          <input type="text" class="form-control" name="title" id="title" placeholder="@lang('Post Title')"
            value="{{ isset($post) ? $post->title : '' }}">
        </div>
        <div class=" form-group">
          <label for="description">@lang('Description')</label>
          <textarea type="text" class="form-control" name="description" id="description" rows="4"
            placeholder="@lang('Post description')">{{ isset($post) ? $post->description : ''}}</textarea>
        </div>
        <div class="form-group">
          <label for="editor">@lang('Content')</label>
          <textarea name="content" id="editor">{{ isset($post) ? $post->content : '' }}</textarea>
        </div>
        @if (isset($post))
        <div class="mb-3">
          <img src="{{ asset($post->headingImage) }}" alt="{{ $post->title     }}" class="img-fluid">
        </div>
        @endif
        <div class="form-group">
          <label class="btn btn-secondary d-block text-truncate" for="file">
            <i data-feather="upload"></i> @lang('Select the Heading Image')
          </label>
          <input type="file" id="file" name="headingImage" hidden accept=".jpg,.jpeg,.png">
        </div>
        <div class="form-group">
          <label for="category">@lang('Category')</label>
          <select name="category" id="category" class="form-control">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" @if (isset($post) && $post->category_id === $category->id)
              {{ 'selected' }}
              @endif>{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">

          <button type="submit" class="btn btn-{{isset($post) ? 'info' : 'success'}} d-block w-100">
            @if (isset($post))
            @lang('Update')
            @else
            @lang('Create')
            @endif
          </button>
        </div>

      </form>
    </div>
  </div>
</div>

<script>
  feather.replace({
    width: '22px',
    height: '22px',
  })
</script>
<script src="{{ asset('js/app.js') }}"></script>

@endsection
