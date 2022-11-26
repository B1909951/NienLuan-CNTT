@extends('shop.layouts.sub')
@section('title', 'S-Book | Giỏ hàng')
@section('content')

<div class="col-sm-9 padding-right">
    <h2 class="title text-center">Giỏ hàng</h2>
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
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    @foreach($carts as $pro)
                    <?php $total = $total + ($pro->count * $pro->price);?>
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
                                <form action="{{URL::to('/cart-edit-count')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="cart_id" value="{{$pro->cart_id}}">
                                    <input class="cart_quantity_input" type="text" name="count" value="{{$pro->count}}" autocomplete="off" size="2" min="1" style="padding: 5px; padding-bottom:2px; margin-right:5px;">
                                    <button type="submit" class="btn btn-warning">Cập nhật</button>
                                </form>
                            </div>
                        </td>
                        <td class="cart_total" >
                            <p class="cart_total_price">{{number_format($pro->count * $pro->price, 0, '.',',').' vnđ'}}</p>
                        </td>
                        <td class="cart_delete" style="margin-right:5px;">
                            <a class="cart_quantity_delete" href="{{URL::to('/cart-delete/'.$pro->cart_id)}}"><i class="fa fa-times"></i></a>
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
                <div class="total_area">
                    <ul class="user_info">
                        <form action="{{URL::to('/cart')}}" method="POST">
                            @csrf
                            <label>Nhập coupon:</label>
                            <input type="text" name="code" value="@if($coupon!=null){{$coupon->code}}@endif" required>
                            @if($coupon!=null)<div style="color: rgb(119, 199, 0); margin-top:5px" >Bạn được giảm {{$coupon->value}}%</div>@endif
                            <button type="submit"  class="btn btn-default update" style="margin-left:0px;">Kiểm tra Coupon</button>
                        </form>
                    </ul>
                    <ul>
                          
                            <li>Coupon<span>@if($coupon!=null){{$coupon->code}} @else Không có@endif</span></li>
                            <li>Tiền sản phẩm<span>{{number_format($total, 0, '.',',').' vnđ'}}</span></li>
                            <li>Tiền giảm<span>@if($coupon!=null){{number_format($total * $coupon->value / 100, 0, '.',',').' vnđ'}} @else 0 vnđ@endif</span></li>
                            <li>Tổng tiền<span>@if($coupon!=null){{number_format($total - $total * $coupon->value / 100, 0, '.',',').' vnđ'}} @else {{number_format($total, 0, '.',',').' vnđ'}}@endif</span></li>
                            
                    </ul>      
                </div>
            </div>
            
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <form action="{{URL::to('/add-order')}}" method="POST">
                            @csrf
                            
                            <li>Họ tên<span>{{$customer->name}}</span></li>
                            <li>Số điện thoại<span>{{$customer->phone}}</span></li>
                            <li>Email<span>{{$customer->email}}</span></li>
                            <input type="hidden" name="customer_id" id="" value="{{$customer->customer_id}}">
                            <input type="hidden" name="sub_total" id="" value="{{$total}}">
                            <input type="hidden" name="coupon_id" id="" value="@if($coupon!=null){{$coupon->coupon_id}}@else 1 @endif">
                            <input type="hidden" name="total" id="" value="@if($coupon!=null){{$total - $total * $coupon->value / 100}}@else {{$total}} @endif">

                            <li style="padding-bottom: 10px">Hình thức thanh toán<span>
                                <select name="type" id="">
                                    <option value="1">Trực tiếp</option>
                                    <option value="Chuyển khoản">Chuyển khoản</option>
                                    <option value="Momo">Momo</option>
                                </select>
                            </span></li>
                            <li>Địa chỉ nhận hàng<span> </span></li>
                            
                            <textarea style="padding-left: 20px; " name="address" id="" cols="30" rows="2" required>@if($customer->address != null){{$customer->address}}@endif</textarea>
                            @if($total)
                            <button type="submit" style="margin-bottom: -15px;" class="btn btn-default check_out">Thanh toán</button>
                            @endif
                        </form>
                    </ul>      
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
</div>
@endsection