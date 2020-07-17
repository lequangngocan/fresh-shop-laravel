@extends('front-end.layouts.base')
@section('script')
<script>
    $(document).ready(function(){
        $("#CartMsg").hide();
        @foreach($data as $pro)
            $("#upCart{{$pro->id}}").on('change keyup', function(){
                var newQty = $("#upCart{{$pro->id}}").val();
                var rowID = $("#rowID{{$pro->id}}").val();
                $.ajax({
                    url:'{{url('update-cart')}}',
                    data:'rowID=' + rowID + '&newQty=' + newQty,
                    type:'get',
                    success:function(response){
                        $("#CartMsg").show();
                        console.log(response);
                        $("#CartMsg").html(response);
                    }
                });
            });
        @endforeach

        $("#coupon_btn").click(function(){
            var coupon_code = $("#coupon_code").val();
            $.ajax({
                url:'{{url('check-coupon')}}',
                data: 'coupon_code=' + coupon_code,
                success:function(res){
                    alert(res);
                }
            })
        })
  });
</script>
@endsection
@section('content')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                    @if (\Session::has('success'))
                    <div class="alert alert-success">
                      <ul>
                        <li>{!! \Session::get('success') !!}</li>
                      </ul>
                    </div>
                  @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Update</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                            <!-- @if(isset($msg))
                            <div class="alert alert-info">{{$msg}}</div>
                            @endif
                            <div class="alert alert-info" id="CartMsg"></div> -->
                                    @foreach($data as $pro)
                                        <tr>
                                            <td class="thumbnail-img">
                                                <a href="#">
                                            <img class="img-fluid" src="{{ asset($pro->options->img) }}" alt="" />
                                                </a>
                                            </td>
                                            <td class="name-pr">
                                                <a href="#">
                                            {{ $pro->name }}
                                                </a>
                                            </td>
                                            <td class="price-pr">
                                                <p>${{ $pro->price }}</p>
                                            </td>
                                            <td class="quantity-box">
                                                <input type="number" size="4" value="{{$pro->qty}}" min="0" step="1" id="upCart{{$pro->id}}" class="c-input-text qty text">
                                                <input type="hidden" value="{{$pro->rowId}}" id="rowID{{$pro->id}}"/>
                                            </td>
                                            <td class="total-pr">
                                                <p>${{ $pro->qty * $pro->price }}</p>
                                            </td>
                                            <td style="text-align:center">
                                                    <a href="view-cart">
                                                        <i class="fa fa-refresh"></i>
                                                    </a>
                                            </td>
                                            <td class="remove-pr">
                                                <a href="remove-cart/{{$pro->rowId}}"  onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    <div class="coupon-box">
                        <div class="input-group input-group-sm">
                            <input class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code" type="text">
                            <div class="input-group-append">
                                <button class="btn btn-theme" type="button">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                        <div class="update-box">
                                <input value="Update Cart" type="submit">
                        </div>
                </div>
            </div> -->

            <div class="row my-5" style="border: 2px solid black;border-radius:1px">
                <div class="col-lg-6 col-sm-6" style="padding-top:20px"> 
                        <div class="coupon-box">
                            <div class="input-group input-group-sm">
                                <input class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code" type="text" id="coupon_code">
                                <div class="input-group-append">
                                    <button class="btn btn-theme" type="button" id="coupon_btn">Apply Coupon</button>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-6 col-sm-6" style="padding-top: 20px">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        <div class="d-flex">
                            <h4>Sub Total</h4>
                            <div class="ml-auto font-weight-bold"> ${{Cart::subtotal()}} </div>
                        </div>
                        <div class="d-flex">
                            <h4>Discount</h4>
                            <div class="ml-auto font-weight-bold"> $ 40 </div>
                        </div>
                        <hr class="my-1">
                        <div class="d-flex">
                            <h4>Coupon Discount</h4>
                            <div class="ml-auto font-weight-bold"> $ {{Cart::discount()}} </div>
                        </div>
                        <!-- <div class="d-flex">
                            <h4>Tax</h4>
                            <div class="ml-auto font-weight-bold"> $ 2 </div>
                        </div> -->
                        <div class="d-flex">
                            <h4>Shipping Cost</h4>
                            <div class="ml-auto font-weight-bold"> $ 3 </div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5"> $ {{Cart::total()}} </div>
                        </div>
                        <hr> </div>
                </div>
                <div class="col-12 d-flex shopping-box" style="padding-bottom: 20px"><a href="{{URL::to('/checkout')}}" class="ml-auto btn hvr-hover">Checkout</a> </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->
@endsection
