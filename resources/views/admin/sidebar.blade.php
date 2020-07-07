<div class="col-md-4">
  <div class="list-group">
    <a href="{{ route('admin.dashboard') }}" class="list-group-item">
      @lang('Dashboard')
    </a>
    <a href="{{ route('users.index') }}" class="list-group-item">
      @lang('Users')
    </a>
    <a href="{{ route('posts.index') }}" class="list-group-item">
      @lang('Posts')
    </a>
    <a href="{{ route('categories.index') }}" class="list-group-item">
      @lang('Categories')
    </a>
  </div>
</div>
