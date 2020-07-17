@extends('back-end.layouts.base')
@section('content')
<div class="content-wrapper" style="min-height: 1203.6px;">
<div class="card-header">
                <h3 class="card-title" style="float:right"><a href="{{URL::to('/back-end/list-product')}}"><button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Add">Sản phẩm</button></a></h3>
              </div>
    <form role="form" method="post" action="" enctype="multipart/form-data">
    @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                    <input type="text" class="form-control" value="{{ $pro->product_name }}" name="product_name">
                    @if($errors->has('product_name'))
                    <span style="color:red;font-size:15px">{{$errors->first('product_name')}}</span>
                    @endif
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" style="padding-right:10px">Chọn danh mục</label>
                        <select name="categoryID">
                            @foreach($category as $cate)
                                @if($cate->id == $pro->categoryID)
                                    <option value="{{$cate->id}}" selected>{{$cate->category_name}}</option>
                                @else
                                    <option value="{{$cate->id}}">{{$cate->category_name}}</option>
                                @endif
                            @endforeach    
                        </select>  
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Ảnh sản phẩm</label><br>
                    <img src="{{ asset($pro->product_image) }}" alt="" width="250px"/><p></p>
                    <input type="file" class="form-control" name="product_image">
                    @if($errors->has('product_image'))
                    <span style="color:red;font-size:15px">{{$errors->first('product_image')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                    <input type="number" class="form-control" value="{{ $pro->price }}" name="price">
                    @if($errors->has('price'))
                    <span style="color:red;font-size:15px">{{$errors->first('price')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Giá khuyến mãi</label>
                    <input type="number" class="form-control" value="{{ $pro->sale_price }}" name="sale_price">
                    @if($errors->has('sale_price'))
                    <span style="color:red;font-size:15px">{{$errors->first('sale_price')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Số lượng</label>
                    <input type="number" class="form-control" value="{{ $pro->amount }}" name="amount">
                    @if($errors->has('amount'))
                    <span style="color:red;font-size:15px">{{$errors->first('amount')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả</label>
                    <textarea class="form-control" id="describe" name="describe">{{ $pro->describe }}</textarea>
                    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
                    <script>
                    CKEDITOR.replace( 'describe' );
                    </script>
                </div>
            </div>
                <!-- /.card-body -->
            <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
    </form>


</div>
@endsection