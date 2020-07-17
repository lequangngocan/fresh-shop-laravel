<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title','ADMIN | Lê Quang Ngọc An')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @include('back-end.layouts.css')
  @yield('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  @include('back-end.layouts.sidebar')

  @yield('content')

  @include('back-end.layouts.footer')

</div>
  @include('back-end.layouts.script')
  @yield('script')
</body>
</html>
