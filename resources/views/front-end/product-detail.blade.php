@extends('front-end.layouts.base')
@section('title','Product Detail | Lê Quang Ngọc An')
@section('content')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop Detail</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Shop Detail </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel " data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100" src="{{ asset($product->product_image) }}" alt="First slide"> </div>
                            <!-- <div class="carousel-item"> <img class="d-block w-100" src="front-end/images/big-img-02.jpg" alt="Second slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="front-end/images/big-img-03.jpg" alt="Third slide"> </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2>{{$product->product_name}}</h2>
                        <h5> <del style="color:red">$ {{$product->price}}</del> $ {{$product->sale_price}}</h5>
                        <p class="available-stock"><span> Views: {{ $product->views }} / Quantity Sold: {{ $product->quantity_sold }} </span><p>
						<h4>Short Description:</h4>
						<p>{!! $product->describe !!}</p>
						<div class="price-box-bar">
							<div class="cart-and-bay-btn">
								<!-- <a class="btn hvr-hover" data-fancybox-close="" href="{{URL::to('/checkout')}}">Buy New</a> -->
								<a class="btn hvr-hover" data-fancybox-close="" href="{{ URL::to('add-cart/'.$product->id) }}">Add to cart</a>
							</div>
						</div>

						<div class="add-to-btn">
							<div class="share-bar">
								<a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
								<a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
								<a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
								<a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
								<a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
							</div>
						</div>
                    </div>
                </div>
            </div>
			
			<div class="row my-5">
				<div class="card card-outline-secondary my-4">
					<div class="card-header">
						<h2>Product Reviews</h2>
					</div>
					<div class="card-body" style="width:1200px">
                    @foreach($comments as $comment)
						<div class="media mb-3">
							<div class="mr-2"> 
								<img class="rounded-circle border p-1" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2264%22%20height%3D%2264%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2064%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_160c142c97c%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_160c142c97c%22%3E%3Crect%20width%3D%2264%22%20height%3D%2264%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2213.5546875%22%20y%3D%2236.5%22%3E64x64%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Generic placeholder image">
							</div>
							<div class="media-body">
								<p>{{$comment->content}}</p>
								<small class="text-muted">Posted by <b>{{$comment->full_name}}</b> on {{$comment->created_at}}</small>
							</div>
						</div>
                    @endforeach
						<hr>
						<a  class="btn hvr-hover" onclick="showHide()">Leave a Review</a>
                        <div id="review" style="display:none; margin-top:20px">
                        @if(Auth::check())
                            <form action="{{URL::to('comment/userID='.Auth::user()->id.'&productID='.$product->id)}}" method="post">
                            @csrf
                            <textarea name="comment" id="" cols="168" rows="10" style="margin-bottom:20px"></textarea>
                            <button type="submit" class="btn hvr-hover">Review</button>
                            </form>
                        @else
                            <h3>You must be to logged !</h3>
                        @endif
                        </div>
					</div>
				  </div>
			</div>

            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Related Products</h1>
                    </div>
                    <div class="featured-products-box owl-carousel owl-theme">
                        @foreach($products as $pro)
                            @if($product->categoryID == $pro->categoryID && $pro->id != $product->id)
                                <div class="item">
                                    <div class="products-single fix">
                                        <div class="box-img-hover">
                                            <img src="{{ asset($pro->product_image) }}" class="img-fluid" alt="Image">
                                            <div class="mask-icon">
                                                <ul>
                                                    <li><a href="{{URL::to('/product-detail/'.$pro->id)}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                </ul>
                                                <a class="cart" href="{{URL::to('add-cart/'.$product->id)}}">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="why-text">
                                            <h4>{{$pro->product_name}}</h4>
                                            <h5> ${{$pro->sale_price}}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->
@endsection

@section('script')
    <script>
    function showHide() {
        var x = document.getElementById("review");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
        alert(msg);
    }
    </script>
@endsection