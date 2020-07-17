@extends('back-end.layouts.base')
@section('content')
<div class="content-wrapper" style="min-height: 1203.6px;">
<div class="card-header">
                <h3 class="card-title" style="float:right"><a href="{{URL::to('/back-end/list-category')}}"><button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Add">Danh mục</button></a></h3>
              </div>
    <form role="form" method="post" action="" enctype="multipart/form-data">
    @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên danh mục</label>
                    <input type="text" name="category_name" class="form-control" value ="{{$cate->category_name}}">
                    @if($errors->has('category_name'))
                    <span style="color:red;font-size:15px">{{$errors->first('category_name')}}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ảnh danh mục</label><br>
                    <img src="{{ asset($cate->category_image) }}" alt="" width="200px"/><p></p>
                    <input type="file" class="form-control" name="category_image">
                    @if($errors->has('category_image'))
                    <span style="color:red;font-size:15px">{{$errors->first('category_image')}}</span>
                    @endif
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                </div>
              </form>
</div>
@endsection