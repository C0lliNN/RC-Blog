<div class="col-md-4">
  <div class="list-group">
    <a href="{{ route('admin.dashboard') }}" class="list-group-item">
      @lang('Dashboard')
    </a>
    @if (Auth::user()->isSuperAdmin)
    <a href="#" class="list-group-item">
      @lang('Users')
    </a>
    @endif
    <a href="#" class="list-group-item">
      @lang('Posts')
    </a>
    <a href="{{ route('categories.index') }}" class="list-group-item">
      @lang('Categories')
    </a>
  </div>
</div>
