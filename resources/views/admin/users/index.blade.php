@extends('layouts.admin')

@section('content')

@include('admin.sidebar')

<script src="https://unpkg.com/feather-icons"></script>

<div class="col-md-8 mt-3 mt-md-0">
  <div class="card">
    @if (Auth::user()->isSuperAdmin)
    <div class="card-header d-flex justify-content-between">
      <h4 class="text-center m-0">@lang('Users')</h4>
      <div class="text-center">
        <a href="{{ route('users.create') }}" class="btn btn-success btn-sm">@lang('New')</a>
      </div>
    </div>
    @else
    <div class="card-header">
      <h4 class="text-center m-0">@lang('Users')</h4>
    </div>
    @endif
    <div class="card-body">
      <ul class="list-group">
        @foreach($users as $user)
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <div>{{ $user->name }}</div>
          @if (Auth::user()->isSuperAdmin)
          <div class="d-flex justify-content-center align-items-center">
            <div data-toggle="tooltip" data-placement="top" title="@lang('Delete')">
              <form action="{{ route('users.destroy', $user) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="text-danger" style="background-color: transparent; outline: none; border: none">
                  <i data-feather="trash-2"></i>
                </button>
              </form>
            </div>

          </div>
          @endif
        </li>
        @endforeach
      </ul>
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
