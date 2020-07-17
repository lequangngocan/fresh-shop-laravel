@extends('back-end.layouts.base')
@section('content')
<div class="content-wrapper" style="min-height: 1203.6px;">
<div class="card-header">
                <h3 class="card-title" style="float:right"><a href="{{URL::to('/back-end/list-user')}}"><button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Add">Tài khoản</button></a></h3>
              </div>
    <form role="form">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên đăng nhập</label>
                    <input type="text" class="form-control" placeholder="Tên đăng nhập">
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Họ và tên</label>
                    <input type="text" class="form-control" placeholder="Họ và tên">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Mật khẩu</label>
                    <input type="password" class="form-control" placeholder="Mật khẩu">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Số điện thoại</label>
                    <input type="number" class="form-control" placeholder="Số điện thoại">
                </div>
            </div>
                <!-- /.card-body -->
            <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
    </form>


</div>
@endsection