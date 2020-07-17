@extends('front-end.layouts.base')
@section('title','Blog | Lê Quang Ngọc An')
@section('content')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Blog</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Blog</li>
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
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="list-view" style="text-align:center;margin-bottom:40px">
                                    <b style="font-size:30px">{{$news->news_title}}</b><p></p>
                                    <img src="{{ asset($news->news_image) }}" alt="" style="width:800px;margin: 20px 0 20px 0" >
                                    <h2>{!!$news->news_detail!!}</h2>
                                    <span style="padding-right:10px">View: {{$news->views}}</span>||<span style="padding-left:10px">Post time: {{$news->created_at}}</span>
                                </div><p></p>
                                <center><i style="font-size:25px">Thanks you for reading !</i></center>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Latest News</h3>
                            </div>
                                @foreach($blogs as $news)
                                    <div class="list-view-box">
                                        <div class="row">
                                            <div class="why-text full-width">
                                                <b>{{$news->news_title}}</b><p></p>
                                                <span>Post time: {{$news->created_at}}</span><p></p>
                                                <a class="btn hvr-hover" href="{{URL::to('blog-detail/'.$news->id)}}">View Details</a>
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
    <!-- End Shop Page -->
@endsection