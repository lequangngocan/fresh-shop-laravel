@extends('back-end.layouts.base')
@section('content')
<div class="content-wrapper" style="min-height: 1203.6px;">
<div class="card-header">
                <h3 class="card-title" style="float:right"><a href="{{URL::to('/back-end/setting')}}"><button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Add">Setting</button></a></h3>
              </div>
    <form role="form">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên công ty</label>
                    <input type="text" class="form-control" placeholder="Tên công ty">
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Logo</label>
                    <input type="file" class="form-control" placeholder="Logo">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Số điện thoại</label>
                    <input type="number" class="form-control" placeholder="Số điện thoại">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Địa chỉ</label>
                    <input type="text" class="form-control" placeholder="Địa chỉ">
                </div>
            </div>
                <!-- /.card-body -->
            <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
    </form>


</div>
@endsection