<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{ asset('sit/css/simplebar.css') }}">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('sit/css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('sit/css/select2.css') }}">
    <link rel="stylesheet" href=" {{ asset('sit/css/dropzone.cs') }}s">
    <link rel="stylesheet" href="{{ asset('sit/css/uppy.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sit/css/jquery.steps.css') }}">
    <link rel="stylesheet" href="{{ asset('sit/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('sit/css/quill.snow.css') }}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ asset('sit/css/daterangepicker.css') }}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('sit/css/app-light.css') }}" id="lightTheme">
    <link rel="stylesheet" href="{{ asset('sit/css/app-dark.css') }}" id="darkTheme" disabled>
  <style>body, h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6, p, a, span, button, input, select, textarea, .nav-link, .navbar-brand { font-family: 'Cairo', sans-serif !important; }</style>
  </head>
  <body class="vertical  light rtl ">
    <div class="wrapper vh-100">
      <div class="row align-items-center h-100">
<form method="POST" action="{{ route('admin.login') }}" class="col-lg-3 col-md-4 col-10 mx-auto text-center">
    @csrf
    <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="#">
        <!-- SVG logo -->
    </a>
    <h1 class="h6 mb-3 mt-4">تسجيل الدخول للوحة التحكم</h1>

    <div class="form-group text-right mb-3">
        <label for="inputEmail" class="sr-only">البريد الإلكتروني</label>
        <input type="email" name="email" id="inputEmail" class="form-control form-control-lg" placeholder="البريد الإلكتروني" required autofocus value="{{ old('email') }}">
    </div>

    <div class="form-group text-right mb-3">
        <label for="inputPassword" class="sr-only">كلمة المرور</label>
        <input type="password" name="password" id="inputPassword" class="form-control form-control-lg" placeholder="كلمة المرور" required>
    </div>

    <div class="custom-control custom-checkbox mb-3 text-right">
        <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember">
        <label class="custom-control-label" for="customCheck1">تذكر بيانات الدخول</label>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">دخول</button>

    @if(session('error'))
        <div class="mt-2 text-danger">
            {{ session('error') }}
        </div>
    @endif

    <p class="mt-5 mb-3 text-muted">© 2026 المتجر الإلكتروني</p>
</form>
      </div> <!-- .row -->
    </div> <!-- .wrapper -->
    <script src="{{ asset('sit/js/jquery.min.jsv') }}"></script>
    <script src="{{ asset('sit/js/popper.min.js') }}"></script>
    <script src="{{ asset('sit/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('sit/js/apps.js') }}"></script>
  </body>
</html>
