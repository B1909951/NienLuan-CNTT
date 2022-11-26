@extends('shop.layouts.sub')
@section('title', 'S-Book | Lịch sử đặt hàng')
@section('content')

<div class="col-sm-9 padding-right">
    <h2 class="title text-center">Lịch sử đặt hàng</h2>
<section id="cart_items">
    <div class="container-fluid">
        
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="">ID</td>
                        <td></td>
                        <td class="">Giá tiền</td>
                        <td class="">Mã giảm</td>
                        <td class="">Tình trạng</td>
                        <td class="">Ngày đặt</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0;?>
                    @foreach($orders as $order)
                    <?php $i+=1?>
                    <tr>
                        <td class="" style="padding-left:20px;">
                            <p class="cart_total_price">{{$order->order_id}}
                               @if($i==1)
                                <span class="badge" style="font-size:18px;color:red; background-color:#ffffff00">New</span>
                                @endif
                            </p>
                        </td>
                        <td><a href="{{URL::to('/order-details/'.$order->order_id)}}">Xem chi tiết</a></td>
                        <td class="">
                            <p>{{number_format($order->total, 0, '.',',').' vnđ'}}</p>
                        </td>
                        
                        <td class="" >
                            @foreach($coupons as $coupon)@if($coupon->coupon_id ==$order->coupon_id)
                                <p class="">Code: {{$coupon->code}}</p>
                                <p class="">Giảm: {{$coupon->value}}%</p>                             
                                @endif
                            @endforeach
                        </td>
                        <td class="" >
                            <p class="">@if($order->status==0)Chưa duyệt @endif @if($order->status==1)Đang vận chuyển @endif @if($order->status==2)Đã nhận hàng @endif @if($order->status==3)Đã được hoàn trả @endif @if($order->status==4)Đã bị hủy @endif</p>
                        </td>
                        <td class="" >
                            <p class="">{{$order->created_at}}</p>
                        </td>
                        
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection