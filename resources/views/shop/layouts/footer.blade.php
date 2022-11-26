<footer id="footer"><!--Footer-->
    <div class="row">
        
        
            
        
        
    </div>
    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span><b>S</b></span><b>-BOOK</b></h2>
                        
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Lối tắt Shop</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li ><a href="{{URL::to('/customer')}}" > <b>Tài khoản</b></a></li>
                            <li><a href="{{URL::to('/orders')}}" "><b> Lịch sử</b></a></li>
                             
                             
                            
                            <li><a href="{{URL::to('/cart')}}" > <b>Cart</b></a></li>
                            <?php
                            if(Session::get('customer_id')){
                            ?>
                    
                            <?php 
                            }
                            ?>
                            <?php
                            $customer_id = Session::get('customer_id');
                            if($customer_id){
                            ?>

                                <li><a href="{{URL::to('/customer-logout')}}"><b>Đăng xuât</b></b></a></li>
                            <?php
                            }else{
                            ?>
                                <li><a href="{{URL::to('/customer-login')}}"><b>Đăng nhập</b></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Danh mục</h2>
                        <ul class="nav nav-pills nav-stacked">
                            @if(!empty($all_category[0]))<li><a href="{{URL::to('/cate-products/'.$all_category[0]->id)}}"><b>{{$all_category[0]->name}}</b></a></li>@endif
                            @if(!empty($all_category[1]))<li><a href="{{URL::to('/cate-products/'.$all_category[1]->id)}}"><b>{{$all_category[1]->name}}</b></a></li>@endif
                            @if(!empty($all_category[2]))<li><a href="{{URL::to('/cate-products/'.$all_category[2]->id)}}"><b>{{$all_category[2]->name}}</b></a></li>@endif
                            @if(!empty($all_category[3]))<li><a href="{{URL::to('/cate-products/'.$all_category[3]->id)}}"><b>{{$all_category[3]->name}}</b></a></li>@endif
                           

                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Thể loại</h2>
                        <ul class="nav nav-pills nav-stacked">
                            
                            @if(!empty($all_genre[0]))<li><a href="{{URL::to('/genre-products/'.$all_genre[0]->id)}}"><b>{{$all_genre[0]->name}}</b></a></li>@endif
                            @if(!empty($all_genre[1]))<li><a href="{{URL::to('/genre-products/'.$all_genre[1]->id)}}"><b>{{$all_genre[1]->name}}</b></a></li>@endif
                            @if(!empty($all_genre[2]))<li><a href="{{URL::to('/genre-products/'.$all_genre[2]->id)}}"><b>{{$all_genre[2]->name}}</b></a></li>@endif
                            @if(!empty($all_genre[3]))<li><a href="{{URL::to('/genre-products/'.$all_genre[3]->id)}}"><b>{{$all_genre[3]->name}}</b></a></li>@endif
                            
                        </ul>
                    </div>
                </div>
                
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>Tìm kiếm:</h2>
                        <form action="{{URL::to('/search')}}" class="searchform" method="POST">
                            @csrf
                            <input type="text" style="color: black" name="keywords" required placeholder="Nhập từ khóa ở đây" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Chúc bạn mua sắm vui vẻ</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="https://www.facebook.com/chanhnam.ha/">Hà Chánh Nam</a></span></p>
            </div>
        </div>
    </div>
    
</footer><!--/Footer-->