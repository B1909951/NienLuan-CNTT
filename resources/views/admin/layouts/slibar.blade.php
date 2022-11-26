<!-- Sidebar Start -->

<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{URL::to('/admin')}}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>S-Book</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                @foreach($admin as $key => $ad)
                <img class="rounded-circle" src="{{asset("/assets/admin/img/$ad->avatar")}}" alt="" style="width: 40px; height: 40px;">
                @endforeach
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">
                    <?php 
                        $name = Session::get('name');
                        if($name){
                        echo '<span>'.$name.'</span>' ;
                    }
                    ?></h6>
                <?php 
						$level = Session::get('level');
						if($level==0){
							echo '<span>Admin</span>' ;
						}
                        else{
							echo '<span>Nhân viên</span>' ;
						}
				?>
               
            </div>
        </div>
        <div class="navbar-nav w-100">
            <?php 
            $currentUrl = $_SERVER['PHP_SELF'] ;
            ?>
            <a href="{{URL::to('/admin')}}" class="nav-item nav-link @if($currentUrl=="/index.php/admin")) active @endif"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown ">
                <a href="#" class="nav-link dropdown-toggle @if($pos = strpos($currentUrl, "admin/order")) active @endif" data-bs-toggle="dropdown"><i class="fa fa-shopping-bag me-2" ></i>Đơn hàng</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{URL::to('/admin/orders')}}" class="dropdown-item">Chưa duyệt</a>
                    <a href="{{URL::to('/admin/order-transport')}}" class="dropdown-item">Đang vận chuyển</a>
                    <a href="{{URL::to('/admin/order-completed')}}" class="dropdown-item">Hoàn thành</a>

                </div>
            </div>
            <a href="{{URL::to('/admin/cate-manage')}}" class="nav-item nav-link @if($pos = strpos($currentUrl, "admin/cate")) active @endif"><i class="fa fa-folder-open me-2"></i>Danh mục</a>
            
            <a href="{{URL::to('/admin/genre-manage')}}" class="nav-item nav-link @if($pos = strpos($currentUrl, "admin/genre")) active @endif"><i class="fa fa-tags me-2"></i>Thể loại</a>
            <a href="{{URL::to('/admin/product-manage')}}" class="nav-item nav-link @if($pos = strpos($currentUrl, "admin/product")) active @endif"><i class="fa fa-book me-2"></i>Sản phẩm</a>
            <a href="{{URL::to('/admin/rate-manage')}}" class="nav-item nav-link @if($pos = strpos($currentUrl, "admin/rate")) active @endif"><i class="fa fa-star me-2"></i>Đánh giá</a>
            <a href="{{URL::to('/admin/coupon-manage')}}" class="nav-item nav-link @if($pos = strpos($currentUrl, "admin/coupon")) active @endif"><i class="fa fa-gift me-2"></i>Mã giảm</a>
            <a href="{{URL::to('/admin/customer-manage')}}" class="nav-item nav-link @if($pos = strpos($currentUrl, "admin/customer")) active @endif"><i class="fa fa-user me-2"></i>Khách hàng</a>
            @if(Session::get('id')==1)<a href="{{URL::to('/admin-manage')}}" class="nav-item nav-link @if($pos = strpos($currentUrl, "admin-")) active @endif"><i class="fa fa-users me-2"></i> Admin</a>@endif
            
        </div>
    </nav>
</div>
<!-- Sidebar End -->