<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\App;

use Closure;

class IdentifyLocationMiddleware {
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next) {
    // Detecting Locale

    if (env('APP_ENV', 'local') === 'local') {
      App::setLocale('en');
    } else {
      $data = Location::get(request()->ip());

      if ($data->countryCode === 'BR') {
        App::setLocale('pt');
      }
    }
    return $next($request);
  }
}
