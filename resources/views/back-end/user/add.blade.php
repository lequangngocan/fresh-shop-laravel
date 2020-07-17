@extends('back-end.layouts.base')
@section('content')
<div class="content-wrapper" style="min-height: 1203.6px;">
<div class="card-header">
                <h3 class="card-title" style="float:right"><a href="{{URL::to('/back-end/list-user')}}"><button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Add">Tài khoản</button></a></h3>
              </div>
    <form role="form" action="" method="post">
    @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên đăng nhập</label>
                    <input type="text" class="form-control" placeholder="Tên đăng nhập" name="user_name" value="{{old('user_name')}}">
                    @if($errors->has('user_name'))
                    <span style="color:red;font-size:15px">{{$errors->first('user_name')}}</span>
                    @endif
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Họ và tên</label>
                    <input type="text" class="form-control" placeholder="Họ và tên" name="full_name" value="{{old('full_name')}}">
                    @if($errors->has('full_name'))
                    <span style="color:red;font-size:15px">{{$errors->first('full_name')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Mật khẩu</label>
                    <input type="password" class="form-control" placeholder="Mật khẩu" name="password" value="{{ old('password') }}">
                    @if($errors->has('password'))
                    <span style="color:red;font-size:15px">{{$errors->first('password')}}</span>
                    @endif
                </div>
                <!-- <div class="form-group">
                    <label for="exampleInputEmail1">Xác nhận mật khẩu</label>
                    <input type="password" class="form-control" placeholder="Mật khẩu" name="password_confirmation">
                </div> -->
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
                    @if($errors->has('email'))
                    <span style="color:red;font-size:15px">{{$errors->first('email')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Địa chỉ</label>
                    <input type="text" class="form-control" placeholder="Địa chỉ" name="address" value="{{old('address')}}">
                    @if($errors->has('address'))
                    <span style="color:red;font-size:15px">{{$errors->first('address')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Số điện thoại</label>
                    <input type="text" class="form-control" placeholder="Số điện thoại" name="phone_number" value="{{old('phone_number')}}">
                    @if($errors->has('phone_number'))
                    <span style="color:red;font-size:15px">{{$errors->first('phone_number')}}</span>
                    @endif
                </div>
            </div>
                <!-- /.card-body -->
            <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm mới</button>
            </div>
    </form>


</div>
@endsection