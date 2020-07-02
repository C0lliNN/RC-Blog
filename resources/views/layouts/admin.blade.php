<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RC Blog - Admin Panel</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>

<body>
  <header style="background-color: #f7f7f7; box-shadow: 0px -4px 13px #000000a1;">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="navbar navbar-light">
            <a class="navbar-brand" href="{{ route('blog.index') }}">RC Blog</a>
            <ul class="navbar-nav ml-auto">

              @auth
              <li class="nav-item">
                <form action="{{ route('logout') }}" method="post">
                  @csrf
                  <button type="submit" class="btn btn-danger btn-sm">@lang('Logout')</button>
                </form>
              </li>
              @endauth

              @guest
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
              </li>
              @endguest

            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>

  <div class="container mt-5">
    <div class="row justify-content-center">
      @yield('content')
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
  </script>

</body>

</html>