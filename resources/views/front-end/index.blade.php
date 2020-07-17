@extends('front-end.layouts.base')
@section('title','Home | Lê Quang Ngọc An')
@section('content')
    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
        @foreach($slider as $slide)
         @if($slide->status == 0)
            <li class="text-center">
                <img src="{{ asset($slide->slide_image) }}" alt="" />
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>{{ $slide->slide_title}}</strong></h1>
                            <p class="m-b-40">{!! $slide->slide_detail !!}</p>
                            <p><a class="btn hvr-hover" href="{{route('product')}}">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
         @endif
        @endforeach
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->

    <!-- Start Categories  -->
    <div class="categories-shop">
        <div class="container">
            <div class="row">
                @foreach($categories2 as $category)
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="shop-cat-box">
                            <img class="img-fluid" src="{{ asset($category->category_image) }}" alt=""/>
                            <a class="btn hvr-hover" href="{{URL::to('/category/'.$category->id)}}">{{$category->category_name}}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Categories -->
	
	<div class="box-add-products">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="offer-box-products">
						<a href="product"><img class="img-fluid" src="front-end/images/add-img-01.jpg" alt="" /></a>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="offer-box-products">
						<a href="product"><img class="img-fluid" src="front-end/images/add-img-02.jpg" alt="" /></a>
					</div>
				</div>
			</div>
		</div>
	</div>

    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Best Selling Products</h1>
                    </div>
                </div>
            </div>
            <div class="row">
            @foreach($products1 as $product)
                <div class="col-lg-3 col-md-6 special-grid best-seller">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="sale">Sale</p>
                            </div>
                            <img src="{{ asset($product->product_image) }}" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="{{URL::to('/product-detail/'.$product->id)}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                </ul>
                                <a class="cart" href="add-cart/{{$product->id}}">Add to Cart</a>
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
    <!-- End Products  -->

    <!-- Start Products  -->
    <div class="box-add-products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Most Viewed Products</h1>
                    </div>
                </div>
            </div>
            <div class="row">
            @foreach($products2 as $product)
                <div class="col-lg-3 col-md-6 special-grid best-seller">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="sale">Sale</p>
                            </div>
                            <img src="{{ asset($product->product_image) }}" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="{{URL::to('/product-detail/'.$product->id)}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                </ul>
                                <a class="cart" href="add-cart/{{$product->id}}">Add to Cart</a>
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
    <!-- End Products  -->

    <!-- Start Blog  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Latest Blog</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($news as $new)
                    <div class="col-md-6 col-lg-4 col-xl-4">
                        <div class="blog-box">
                            <div class="blog-img">
                                <img class="img-fluid" src="{{ asset($new->news_image) }}" alt="" />
                            </div>
                            <div class="blog-content">
                                <div class="title-blog">
                                    <h3 class="blog-read-more"><a href="blog-detail/{{$new->id}}">{{ $new->news_title }}</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Blog  -->

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