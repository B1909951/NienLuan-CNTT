@extends('shop.layouts.main')
@section('title', 'S-Book | Danh mục')
@section('content')

<div class="col-sm-9 padding-right">
	<div class="features_items"><!--features_items-->
		<h2 class="title text-center">Sản phẩm thuộc danh mục: {{$cate_name}}</h2>
        @if(!isset($cate_products[0])) <h4>Không có sản phẩm thuộc danh mục này</h4>
        @else
		@foreach ($cate_products as $product)
		<div class="col-sm-4">
			<a href="{{URL::to('/product-details/'.$product->id)}}">
			<div class="product-image-wrapper" style="height: 380px">
				<div class="single-products">
					
					<div class="productinfo text-center">
						<img src="{{asset("/assets/clients/pro_img/$product->image")}}" alt="" />
						<h2 style="margin-top: 5px">{{number_format($product->price, 0, '.',',').' vnđ'}}</h2>
						<form action="{{URL::to('/add-to-cart')}}" method="POST" style="margin-bottom:10px">
							@csrf
							<input type="hidden" value="{{Session::get('customer_id')}}" name="id"/>
							<input type="hidden" value="{{$product->id}}" name="id"/>
							<input type="hidden" value="1" name="count"/>
							<button type="submit" class="btn btn-default add-to-cart" >
								<i class="fa fa-shopping-cart"></i>
								Thêm vào giỏ hàng
							</button>
						</form>
						<h4 style="overflow: hidden; height:40px">{{$product->name}}</h4>

					</div>
				</div>
			</div>
			</a>
		</div>
		@endforeach
        @endif
	</div><!--/category-tab-->				
</div>
@endsection
