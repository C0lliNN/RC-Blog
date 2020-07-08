@if ($paginator->hasPages())
<div class="clearfix">
  @if (!$paginator->onFirstPage())
  <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-primary float-left">
    &larr; @lang('Newer Posts')
  </a>
  @endif
  @if ($paginator->hasMorePages())
  <a class="btn btn-primary float-right" href="{{ $paginator->nextPageUrl() }}">@lang('Older Posts') &rarr;</a>
  @endif
</div>
@endif
