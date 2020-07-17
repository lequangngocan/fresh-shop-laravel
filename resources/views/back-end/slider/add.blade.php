@extends('back-end.layouts.base')
@section('content')
<div class="content-wrapper" style="min-height: 1203.6px;">
<div class="card-header">
                <h3 class="card-title" style="float:right"><a href="{{URL::to('/back-end/list-slide')}}"><button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Add">Slide</button></a></h3>
              </div>
    <form role="form" method="post" enctype="multipart/form-data">
    @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tiêu đề</label>
                    <input type="text" class="form-control" placeholder="Tiêu đề" name="slide_title" value="{{ old('slide_title') }}">
                    @if($errors->has('slide_title'))
                    <span style="color:red;font-size:15px">{{$errors->first('slide_title')}}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ảnh slide</label>
                    <input type="file" class="form-control" placeholder="Ảnh slide" name="slide_image" value="{{ old('slide_image') }}">
                    @if($errors->has('slide_image'))
                    <span style="color:red;font-size:15px">{{$errors->first('slide_image')}}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nội dung</label>
                    <input type="text" class="form-control" placeholder="Nội dung" name="slide_detail" value="{{ old('slide_detail') }}">
                    @if($errors->has('slide_detail'))
                    <span style="color:red;font-size:15px">{{$errors->first('slide_detail')}}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Link</label>
                    <input type="text" class="form-control" placeholder="Link" name="link" value="{{ old('link') }}">
                    @if($errors->has('link'))
                    <span style="color:red;font-size:15px">{{$errors->first('link')}}</span>
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