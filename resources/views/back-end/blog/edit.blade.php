@extends('back-end.layouts.base')
@section('content')
<div class="content-wrapper" style="min-height: 1203.6px;">
<div class="card-header">
                <h3 class="card-title" style="float:right"><a href="{{URL::to('/back-end/list-blog')}}"><button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Add">Tin tức</button></a></h3>
              </div>
              <form role="form" method="post" enctype="multipart/form-data">
    @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tiêu đề tin tức</label>
                    <input type="text" class="form-control" placeholder="Tiêu đề tin tức" name="news_title" value="{{ $blog->news_title }}">
                    @if($errors->has('news_title'))
                    <span style="color:red;font-size:15px">{{$errors->first('news_title')}}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ảnh tin tức</label><br>
                    <img src="{{ asset($blog->news_image) }}" alt="" width="200px"/><p></p>
                    <input type="file" class="form-control" name="news_image">
                    @if($errors->has('news_image'))
                    <span style="color:red;font-size:15px">{{$errors->first('news_image')}}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nội dung</label>
                    <textarea class="form-control" id="news_detail" name="news_detail">{!! $blog->news_detail !!}</textarea>
                    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
                    <script>
                    CKEDITOR.replace( 'news_detail' );
                    </script>
                    @if($errors->has('news_detail'))
                    <span style="color:red;font-size:15px">{{$errors->first('news_detail')}}</span>
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