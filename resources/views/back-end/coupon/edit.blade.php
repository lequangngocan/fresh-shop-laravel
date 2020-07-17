@extends('back-end.layouts.base')
@section('content')
<div class="content-wrapper" style="min-height: 1203.6px;">
<div class="card-header">
                <h3 class="card-title" style="float:right"><a href="{{URL::to('/back-end/list-coupon')}}"><button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Add">Mã giảm giá</button></a></h3>
              </div>
    <form role="form" method="post">
    @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên mã</label>
                    <input type="text" class="form-control" value="{{$coupon->coupon_name}}" name="coupon_name">
                    @if($errors->has('coupon_name'))
                    <span style="color:red;font-size:15px">{{$errors->first('coupon_name')}}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mã code</label>
                    <input type="text" class="form-control" value="{{$coupon->coupon_code}}" name="coupon_code">
                    @if($errors->has('coupon_code'))
                    <span style="color:red;font-size:15px">{{$errors->first('coupon_code')}}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Chi tiết </label>
                    <input type="text" class="form-control" value="{{$coupon->coupon_detail}}" name="coupon_detail">
                    @if($errors->has('coupon_detail'))
                    <span style="color:red;font-size:15px">{{$errors->first('coupon_detail')}}</span>
                    @endif
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
              </form>


</div>
@endsection