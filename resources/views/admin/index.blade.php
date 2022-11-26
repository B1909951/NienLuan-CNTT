@extends('admin.layouts.main')
@section('title', 'Admin | Dashboard')
@section('content')

    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-users fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Số Admin</p>
                        <h6 class="mb-0">{{$all_admin->count()}}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-book me-2 fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Số sản phẩm</p>
                        <h6 class="mb-0">{{$all_product->count()}}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-shopping-bag fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Số đơn hàng</p>
                        <h6 class="mb-0">{{$all_order->count()}}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-user fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Số khách hàng</p>
                        <h6 class="mb-0">{{$all_customer->count()}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
@endsection
