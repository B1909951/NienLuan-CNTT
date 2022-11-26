
<!-- Navbar Start -->
<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
    <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    <form class="d-none d-md-flex ms-4">
        <input class="form-control border-0" type="search" placeholder="Search">
    </form>
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-bell me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Thông báo</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                <a href="#" class="dropdown-item">
                    <h6 class="fw-normal mb-0">Profile updated</h6>
                    <small>15 minutes ago</small>
                </a>
                <hr class="dropdown-divider">
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                @foreach($admin as $key => $ad)
                <img class="rounded-circle me-lg-2" src="{{asset("/assets/admin/img/$ad->avatar")}}" alt="" style="width: 40px; height: 40px;">
                @endforeach
                <span class="d-none d-lg-inline-flex">
                    <?php 
                    $admin_name = Session::get('name');
                    if($admin_name){
                        echo '<span style="font-weight:bold">'. $admin_name .'</span>' ;
                    }
                    ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                <a href="{{URL::to('/admin-edit/'.Session::get('id'))}}" class="dropdown-item">Tài khoản</a>
                <a href="{{URL::to('/admin-logout')}}" class="dropdown-item">Đăng xuất</a>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->