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
<body class="hold-transition sidebar-mini layout-fixed" style="background:#F5F5F5">
    <div class="wrapper" style="position: relative">
        <div class="login-box" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, 10%);">
            <div class="login-logo">
                <a href="#"><b>Admin</b>LTE</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="" method="post">
                @csrf
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Tên đăng nhập" name="user_name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                        <input type="checkbox" id="remember">
                        <label for="remember">
                            Remember Me
                        </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                     I forgot my password
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                     Register a new membership
                    </a>
                </div>
                <!-- /.social-auth-links -->
                </div>
                <!-- /.login-card-body -->
            
            
            </div>
            @if (\Session::has('success'))
                    <div class="alert alert-success">
                      <ul>
                        <li>{!! \Session::get('success') !!}</li>
                      </ul>
                    </div>
                  @endif
        </div>
    </div>
  @include('back-end.layouts.script')
  @yield('script')
</body>
</html>