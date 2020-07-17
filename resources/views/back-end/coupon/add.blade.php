@extends('back-end.layouts.base')
@section('content')
<div class="content-wrapper" style="min-height: 1203.6px;">
<div class="card-header">
                <h3 class="card-title" style="float:right"><a href="{{URL::to('/back-end/list-coupon')}}"><button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Add">Mã giảm giá</button></a></h3>
              </div>
    <form role="form" method="post" action="">
    @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên mã</label>
                    <input type="text" class="form-control" placeholder="Tên mã" name="coupon_name" value="{{ old('coupon_name') }}">
                    @if($errors->has('coupon_name'))
                    <span style="color:red;font-size:15px">{{$errors->first('coupon_name')}}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mã giảm giá</label>
                    <input type="text" class="form-control" placeholder="Mã giảm giá" name="coupon_code" value="{{ old('coupon_code') }}">
                    @if($errors->has('coupon_code'))
                    <span style="color:red;font-size:15px">{{$errors->first('coupon_code')}}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Chi tiết</label>
                    <input type="text" class="form-control" placeholder="Chi tiết" name="coupon_detail" value="{{ old('coupon_detail') }}">
                    @if($errors->has('coupon_detail'))
                    <span style="color:red;font-size:15px">{{$errors->first('coupon_detail')}}</span>
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