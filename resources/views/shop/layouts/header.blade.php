<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
    
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{URL::to('/')}}"><img src="{{asset("/assets/clients/images/logo.jpg")}}" height="75px" alt="" /></a>
                    </div>
                    
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right" >
                        <ul class="nav navbar-nav" >
                            <li ><a href="{{URL::to('/customer')}}" style="font-size: 20px"><i class="fa fa-user"></i> Tài khoản</a></li>
                            <li><a href="{{URL::to('/orders')}}" style="font-size: 20px"><i class="fa fa-clock-o"></i> Lịch sử</a></li>
                             
                             
                            
                            <li><a href="{{URL::to('/cart')}}" style="font-size: 20px"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            <?php
                            if(Session::get('customer_id')){
                            ?>
                            <li class="dropdown" ><a href="#"> <i class="fa fa-bell me-lg-2" style="font-size: 20px"><span class="badge" style="color:red; background-color:#ffffff00">New</span></i><i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    @if(!isset($notif))
                                    <li style="font-size: 16px; color:#F0F0E9">Không có thông báo nào!</li> 
                                    @endif  
                                    @if(isset($notif))
                                    @foreach($notif as $noti)
                                        <li style="font-size: 16px; color:#F0F0E9">{{$noti->message}}</li> 
                                    @endforeach
                                    @endif 
                                </ul>
                            </li> 
                            <?php 
                            }
                            ?>
                            <?php
                            $customer_id = Session::get('customer_id');
                            if($customer_id){
                            ?>

                                <li><a href="{{URL::to('/customer-logout')}}" style="font-size: 20px"><i class="fa fa-unlock-alt"></i>Đăng xuât</a></li>
                            <?php
                            }else{
                            ?>
                                <li><a href="{{URL::to('/customer-login')}}" style="font-size: 20px"><i class="fa fa-lock"></i>Đăng nhập</a></li>
                            <?php
                            }
                            ?>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{URL::to('/')}}" class="active">Trang chủ</a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{URL::to('/customer')}}"><i class="fa fa-user"></i> Tài khoản</a></li>
                                    <li><a href="{{URL::to('/orders')}}"><i class="fa fa-clock-o"></i> Lịch sử</a></li>
                                    <li><a href="{{URL::to('/cart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                    <li><a href="{{URL::to('/customer-login')}}"><i class="fa fa-lock"></i>Đăng nhập</a></li>
                                    
                                </ul>
                            </li> 
                        </ul>
                    </div>
                </div>
                <div class="col-sm-5">
                    <form action="{{URL::to('/search')}}" method="POST">
                        @csrf
                        <div class="search_box pull-right">
                            <input type="text" name="keywords" placeholder="Tìm kiếm sản phẩm" style="color: black" required/>
                            <input type="submit" name="search_button" style="background-color:#fc4f13; color:#F0F0E9" class="btn btn-default btn-sm " value="Tìm kiếm">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->