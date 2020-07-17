@extends('front-end.layouts.base')
@section('title','Category | Lê Quang Ngọc An')
@section('content')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Categories</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Gallery  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Our Categories</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                                @foreach($categories as $category)
								    <a href="{{URL::to('/category/'.$category->id)}}"><button  class="btn btn-default hvr-hover ">{{$category->category_name}}</button></a>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12 ">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                                        <div class="row">
                                                            @foreach($list_products as $product)
                                                                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                                    <div class="products-single fix">
                                                                        <div class="box-img-hover">
                                                                            <img src="{{ asset($product->product_image) }}" class="img-fluid" alt="Image" style="height:300px">
                                                                            <div class="mask-icon">
                                                                                <ul>
                                                                                    <li><a href="{{URL::to('/product-detail/'.$product->id)}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                                                </ul>
                                                                                <a class="cart" href="{{URL::to('add-cart/'.$product->id)}}">Add to Cart</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="why-text">
                                                                            <h4>{{$product->product_name}}</h4>
                                                                            <h5 style="background-color:red"><strike>${{$product->price}}</strike></h5>
                                                                            <h5 style="float:right">${{$product->sale_price}}</h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                </div>
                           
                        </div>
                </div>
            </div>
    </div>
    <!-- End Gallery  -->
@endsection
@section('script')
<script>
  var msg = '{{Session::get('alert')}}';
  var exist = '{{Session::has('alert')}}';
  if(exist){
    alert(msg);
  }
</script>
@endsection
@section('script')
<script>
  var msg = '{{Session::get('alert')}}';
  var exist = '{{Session::has('alert')}}';
  if(exist){
    alert(msg);
  }
</script>
@endsection