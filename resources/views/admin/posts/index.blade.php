@extends('layouts.admin')

@section('content')

@include('admin.sidebar')

<script src="https://unpkg.com/feather-icons"></script>

<div class="col-md-8 mt-3 mt-md-0">
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <h4 class="text-center m-0">{{ __('Posts') }}</h4>
      <div class="text-center">
        <a href="{{ route('posts.create') }}" class="btn btn-success btn-sm">@lang('New')</a>
      </div>
    </div>

    <div class="card-body">
      <ul class="list-group">
        @foreach($posts as $post)
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <div>{{ $post->title }}</div>
          <div class="d-flex justify-content-center align-items-center">
            <div class="mx-2" data-toggle="tooltip" data-placement="top" title="@lang('Edit')">
              <a class="text-primary" href="{{ route('posts.edit', $post) }}">
                <i data-feather="edit-2"></i>
              </a>
            </div>
            <div data-toggle="tooltip" data-placement="top" title="@lang('Delete')">
              <form action="{{ route('posts.destroy', $post) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="text-danger" style="background-color: transparent; outline: none; border: none">
                  <i data-feather="trash-2"></i>
                </button>
              </form>
            </div>

          </div>
        </li>
        @endforeach
      </ul>
      <div class="mt-3 d-flex justify-content-center">
        {{ $posts->links() }}
      </div>
    </div>
  </div>
</div>

<script>
  feather.replace({
    width: '19px',
    height: '19px',
  })
</script>

@endsection
