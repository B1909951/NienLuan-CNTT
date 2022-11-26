@extends('shop.layouts.sub')
@section('title', 'S-Book | Chi tiết đơn hàng')
@section('content')

<div class="col-sm-9 padding-right">
    <h2 class="title text-center">Chi tiết đơn hàng</h2>
<section id="cart_items">
    <div class="container-fluid">
        
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Sản phẩm</td>
                        <td class="description"></td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tiền</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    @foreach($products as $pro)
                    <tr>
                        <td class="cart_product">
                            <a href="{{URL::to('/product-details/'.$pro->product_id)}}"><img style="height: 150px; width:150px" src="{{asset("/assets/clients/pro_img/$pro->image")}}" alt=""></a>
                        </td>
                        <td class="cart_description" style="padding-left:40px;width:30%">
                            <h4><a href="">{{$pro->name}}</a></h4>
                            <p>Web ID: {{$pro->product_id}}</p>
                        </td>
                        <td class="cart_price">
                            <p>{{number_format($pro->price, 0, '.',',').' vnđ'}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <input class="cart_quantity_input" type="text" name="count" value="{{$pro->count}} " readonly autocomplete="off" size="2" min="1" style="padding: 5px; padding-bottom:2px; margin-right:5px;">
                            </div>
                        </td>
                        <td class="cart_total" >
                            <p class="cart_total_price">{{number_format($pro->count*$pro->price, 0, '.',',').' vnđ'}}</p>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container-fluid">
        <div class="heading">
            <h3></h3>
            
        </div>
        <div class="row">
            
           
            <div class="col-sm-6">
                <div class="total_area"  style="padding-top: 10px">
                    <ul class="user_info" style="margin-top: 0px">
                            @foreach($coupons as $coupon)@if($coupon->coupon_id ==$order->coupon_id)
                                <label>Coupon:</label>
                                <input type="text" name="code" value="{{$coupon->code}}" readonly>
                                <div style="color: rgb(119, 199, 0); margin-top:5px" >Bạn được giảm           {{$coupon->value}}%</div>
                                @endif
                            @endforeach
                    </ul>
                    <ul>
                        @foreach($coupons as $coupon)@if($coupon->coupon_id ==$order->coupon_id)
                            <li>Coupon<span>{{$coupon->code}}</span></li> @else 
                            @endif
                        @endforeach
                            <li>Tiền sản phẩm<span>{{number_format($order->sub_total, 0, '.',',').' vnđ'}}</span></li>
                            <li>Tiền giảm<span>{{number_format($order->sub_total - $order->total, 0, '.',',').' vnđ'}}</span></li>
                            <li>Tổng tiền<span>{{number_format($order->total, 0, '.',',').' vnđ'}}</span></li>                          
                            
                            
                            
                    </ul>      
                </div>
            </div>
            
            <div class="col-sm-6">
                <div class="total_area"  style="padding-top: 10px;padding-top: 3px;">
                    <ul style="margin-top: 0px">
                            <li>Họ tên<span>{{$customer->name}}</span></li>
                            <li>Số điện thoại<span>{{$customer->phone}}</span></li>
                            <li>Email<span>{{$customer->email}}</span></li>
                            <li>Hình thức thanh toán<span>{{$order->type}}</span></li>
                            <li>Địa chỉ nhận hàng<span> </span></li>
                            <textarea style="padding-left: 20px; " name="address" id="" cols="30" rows="2" readonly>{{$order->address}}</textarea>    
                    </ul>      
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
</div>
@endsection