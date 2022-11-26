@extends('shop.layouts.sub')
@section('title', 'S-Book | Chi tiết sản phẩm')
@section('content')

<div class="col-sm-9 padding-right">
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                <img src="{{asset("/assets/clients/pro_img/$product->image")}}" alt="" />
            </div>
            

        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
                <h2>{{$product->name}} ({{$product->view}}<i class="fa fa-eye" aria-hidden="true"></i>)</h2>
                <h4>Đánh giá: @for($i=1;$i<=$product->star;$i++)<i class="fa fa-star" aria-hidden="true" style="color:#fc4f13"> </i>@endfor </h4>
                <p>Product ID: {{$product->id}}</p>
                <p>Thể loại: - @foreach ($pro_genre as $genre)
                    <a href="{{URL::to('/genre-products/'.$genre->genre_id)}}">
                        {{$genre->name}}
                    </a> - 
                    @endforeach</p>
                <p>Danh mục: - @foreach ($all_category as $cate)
                    @if($cate->id == $product->cate_id)
                    <a href="{{URL::to('/cate-products/'.$cate->id)}}">
                        {{$cate->name}}
                    </a> - 
                    @endif
                    @endforeach</p>
                <img src="images/product-details/rating.png" alt="" />
                <span>
                    <h2 style="color:#fc4f13">{{number_format($product->price, 0, '.',',').' vnđ'}}</h2>
                    <form action="{{URL::to('/add-to-cart')}}" method="POST">
                        @csrf
                        <label> Số lượng:</label>
                        <input type="hidden" value="{{Session::get('customer_id')}}" name="id"/>
                        <input type="hidden" value="{{$product->id}}" name="id"/>
                        <input type="number" value="1" min="1" name="count"/>
                        @if($product->show == 1) <button type="submit" class="btn btn-fefault cart" >
                            <i class="fa fa-shopping-cart"></i>
                            Thêm vào giỏ hàng
                        </button>
                    @endif 
                    </form>
                </span>
                <p><b>Tình trạng:</b>@if($product->show == 1) Còn hàng @else  Hết hàng @endif </p>
            </div><!--/product-information-->
        </div>
    </div><!--/product-details-->
    
    <div class="category-tab shop-details-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#desc" data-toggle="tab">Mô tả</a></li>
                <li><a href="#details" data-toggle="tab">Chi tiết</a></li>
                <li ><a href="#reviews" data-toggle="tab">Rate</a></li>
                <li ><a href="#comments" data-toggle="tab">Reviews</a></li>

            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="desc" >
                <div class="col-sm-12" style="padding:10px">
                    <p style="margin-right: 10px; font-size:18px">{{$product->desc}}</p>
                </div>
            </div>

            <div class="tab-pane fade" id="details" >
                <div class="col-sm-12" style="padding:10px;">
                    <p style="margin-right: 10px; font-size:18px">{{$product->detail}}</p>
                </div>
            </div>

            <div class="tab-pane fade" id="reviews" >
                <div class="col-sm-12">
                    
                    
                    <p style=" font-size:18px"><b>Đánh giá của bạn</b></p>
                    
                    <form action="{{URL::to('/add-rate')}}" method="POST">
                        @csrf
                        <?php
                            if($exist_rate == null){
                        ?>
                        <p style=" font-size:18px"><b class="col-sm-12" style="margin-left: 0px" >Bình luận: </b></p> 
                        <textarea name="comment" required style=" font-size:18px;color:black"></textarea>
                        <p style=" font-size:18px"><b class="col-sm-12" style="margin-left: 0px" >Rating: </b></p> 
                        <select name="rating" id="" class="col-sm-4" style=" font-size:18px; magin-top:-50px">
                            <option value=5 selected="selected" >Rất tốt - 5 sao</option>
                            <option value=4  >Tốt - 4 sao</option>
                            <option value=3>Bình thường - 3 sao</option>
                            <option value=2>Tệ - 2 sao</option>
                            <option value=1>Rất tệ - 1 sao</option>
                        </select>
                        <?php 
                            }else{
                        ?>
                        <p style=" font-size:18px"><b class="col-sm-12" style="margin-left: 0px" >Bình luận: </b></p> 
                        <textarea name="comment" required style=" font-size:18px;color:black">{{$exist_rate->comment}}</textarea>
                        <p style=" font-size:18px"><b class="col-sm-12" style="margin-left: 0px" >Rating: </b></p> 
                        <select name="rating" id="" class="col-sm-4" style=" font-size:18px; magin-top:-50px">
                            <option value=5 @if($exist_rate->rating ==5)selected="selected" @endif >Rất tốt - 5 sao</option>
                            <option value=4 @if($exist_rate->rating ==4)selected="selected"  @endif>Tốt - 4 sao</option>
                            <option value=3 @if($exist_rate->rating ==3)selected="selected"  @endif>Bình thường - 3 sao</option>
                            <option value=2 @if($exist_rate->rating ==2)selected="selected"  @endif>Tệ - 2 sao</option>
                            <option value=1 @if($exist_rate->rating ==1)selected="selected"  @endif>Rất tệ - 1 sao</option>
                        </select>
                        <?php 
                            }
                            ?>
                        <?php
                            $customer_id = Session::get('customer_id');
                            if($customer_id){
                        ?>
                        <input type="hidden" name="customer_id" value="{{$customer_id}}">
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <?php 
                            }
                            ?>
                        <?php
                            $customer_id = Session::get('customer_id');
                            if($exist_order == null){
                        ?>
                        <p class="pull-right">Vui lòng mua sản phẩm để thực hiện chức năng</p> 
                        <?php 
                            }elseif(!$customer_id){
                        ?>
                        <p class="pull-right">Vui lòng đăng nhập để thực hiện chức năng <a href="{{URL::to('/customer-login')}}"</i>Đăng nhập</a></p>  
                        <?php 
                            }elseif($customer_id){
                        ?>  
                            <button type="submit" class="btn btn-default pull-right">
                                Submit
                            </button> 
                        <?php
                            }
                        ?>    
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="comments" >
                @if(empty($comments[0])) 
                <div class="col-sm-12" style="padding:5px; border: 1px solid #aaaaaa; margin-bottom:5px; border-radius:1px">
                    <p style="margin-left: 10px; font-size:18px">Chưa có đánh giá nào</p>
                </div>
                @else
                @foreach($comments as $cmt)
                <div class="col-sm-12" style="padding:5px; border: 1px solid #aaaaaa; margin-bottom:5px; border-radius:1px">
                    <a href="#" style="margin-right: 10px ; font-size:18px"><i class="fa fa-user"> <b>{{$cmt->name}}</b></i></a>
                    <a href="#" style="margin-right:1px; font-size:18px; color:#fc4f13">
                        @for($i=1;$i<=$cmt->rating;$i++)<i class="fa fa-star"> </i>@endfor 
                        </a>
                    <a href="#" style="margin-right: 10px; font-size:18px" class="pull-right"><i class="fa fa-calendar-o"></i> <b>{{$cmt->created_at}}</b></a>
                    <p style="margin-left: 10px; font-size:18px">{{$cmt->comment}}</p>
                </div>
                @endforeach
                @endif
            </div>
            
        </div>
    </div><!--/category-tab-->
    
    <div class="recommended_items"><!--recommended_items-->
        @if (isset($same_products[0]))
        <h2 class="title text-center" style="margin: 10px">Một số sản phẩm khác</h2>
        @endif
        
        
        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">	
                    <?php $count = 0 ?>
                    @foreach($same_products as $same_pro)
                    <input type="hidden" value="{{$count++}}"> 
                    @if ($count <= 3)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper" style="height: 400px">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset("/assets/clients/pro_img/$same_pro->image")}}" alt="" />
                                    <h2>{{number_format($same_pro->price, 0, '.',',').' vnđ'}}</h2>
                                    
                                    <a href="{{URL::to('/product-details/'.$same_pro->pro_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Xem chi tiết</a>
                                    <h4 style="margin-top: 5px">{{$same_pro->name}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                @if ($count > 3)
                <div class="item">	
                    <?php $count = 0 ?>
                    @foreach($same_products as $same_pro)
                    <input type="hidden" value="{{$count++}}"> 
                    @if ($count >3)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset("/assets/clients/pro_img/$same_pro->image")}}" alt="" />
                                    <h2 >{{number_format($same_pro->price, 0, '.',',').' vnđ'}}</h2>
                                    <a href="{{URL::to('/product-details/'.$same_pro->pro_id)}}" class="btn btn-default add-to-cart" ><i class="fa fa-eye"></i>Xem chi tiết</a>
                                    <h4 style="margin-top: 5px">{{$same_pro->name}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                @endif
            </div>
             <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
              </a>
              <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
              </a>			
        </div>
    </div><!--/recommended_items-->
    
</div>
@endsection
