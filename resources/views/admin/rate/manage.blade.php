@extends('admin.layouts.main')
@section('title', 'Admin | Quản lý đánh giá')
@section('content')
<div class="container-fluid pt-4 px-4">
<div class="row g-4">
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4 fs-3">Danh sách đánh giá</h6>
        <div class="table-responsive">
            <div id="toolbar" class="btn-group">
            </div>
            <table data-toolbar="#toolbar" data-toggle="table" class="table table-hover">
                <thead>
                    <tr>
                        <th style="">
                            <div class="th-inner sortable">ID</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="">
                            <div class="th-inner sortable">Sản phẩm</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="">
                            <div class="th-inner ">Khách hàng</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="">
                            <div class="th-inner sortable">Comment</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="">
                            <div class="th-inner sortable">Rate</div>
                            <div class="fht-cell"></div>
                        </th>
                       
                        <th style="">
                            <div class="th-inner ">Hành động</div>
                            <div class="fht-cell"></div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_rate as $rate)
                    @if($rate->status<2)

                    <tr data-index="0">
                        <td style="">{{$rate->rate_id}}</td>
                        <td ><p> <img src="{{asset("/assets/clients/pro_img/$rate->product_image")}}" width="100">
                        </p>
                        </td>
                        <td style="">{{$rate->customer_email}}</td>
                        <td style="">{{$rate->comment}}</td>

                        <td style="">{{$rate->rating}}<i class="fa fa-star text-warning" ></td>
                        <td class="form-group" style="">
                            <a  onclick="return confirm('Bạn có muốn xóa đánh giá này?')"  href="{{URL::to('/admin/rate-delete/'.$rate->rate_id)}}" class="btn btn-warning">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a  onclick="return confirm('Bạn có muốn khóa tài khoản này?')"  href="{{URL::to('/admin/customer-delete/'.$rate->customer_id)}}" class="btn btn-danger">
                                <i class="fa fa-lock"></i>
                            </a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4 fs-3">Danh sách đánh giá đã xóa</h6>
            <div class="table-responsive">
                <table data-toolbar="#toolbar" data-toggle="table" class="table table-hover">
                    <thead>
                        <tr>
                            <th style="">
                                <div class="th-inner sortable">ID</div>
                                <div class="fht-cell"></div>
                            </th>
                            <th style="">
                                <div class="th-inner sortable">Sản phẩm</div>
                                <div class="fht-cell"></div>
                            </th>
                            <th style="">
                                <div class="th-inner ">Khách hàng</div>
                                <div class="fht-cell"></div>
                            </th>
                            <th style="">
                                <div class="th-inner sortable">Comment</div>
                                <div class="fht-cell"></div>
                            </th>
                            <th style="">
                                <div class="th-inner sortable">Rate</div>
                                <div class="fht-cell"></div>
                            </th>
                           
                            <th style="">
                                <div class="th-inner ">Hành động</div>
                                <div class="fht-cell"></div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($all_rate as $rate)
                    @if($rate->status>1)

                    <tr data-index="0">
                        <td style="">{{$rate->rate_id}}</td>
                        <td ><p> <img src="{{asset("/assets/clients/pro_img/$rate->product_image")}}" width="100">
                        </p>
                        </td>
                        <td style="">{{$rate->customer_email}}</td>
                        <td style="">{{$rate->comment}}</td>

                        <td style="">{{$rate->rating}}<i class="fa fa-star text-warning" ></i></td>
                        <td class="form-group" style="">
                            <a onclick="return confirm('Bạn có muốn khôi phục đánh giá đã xóa này?')" href="{{URL::to('/admin/rate-recover/'.$rate->rate_id)}}" class="btn btn-primary">
                                    <i class="fa fa-undo"></i>
                                </a>
                            <a onclick="return confirm('Hành động ảnh hưởng đến cơ sở dữ liệu!!! Bạn có muốn xóa vĩnh viễn đánh giá này khỏi cơ sở dữ liệu?')" href="{{URL::to('/admin/rate-deletedb/'.$rate->rate_id)}}" class="btn btn-danger">
                                <i class="fas fa-times"></i>
                            </a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection