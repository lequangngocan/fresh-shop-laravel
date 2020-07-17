@extends('front-end.layouts.base')
@section('title','Product | Lê Quang Ngọc An')
@section('content')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Shop</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                   <h1>Search Results : {{$keyword}}</h1>
                                </div>
                            </div>
                            <!-- <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                        
                        <div class="product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                    @if(count($products) == 0)
                                    <h3> Sorry, data not found !</h3>
                                    @else
                                        @foreach($products as $product)
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <img src="{{ asset($product->product_image) }}" class="img-fluid" alt="Image" style="width:300px">
                                                        <div class="mask-icon">
                                                            <ul>
                                                                <li><a href="{{URL::to('/product-detail/'.$product->id)}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            </ul>
                                                            <a class="cart" href="add-cart/{{ $product->id }}">Add to Cart</a>
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
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->
@endsection