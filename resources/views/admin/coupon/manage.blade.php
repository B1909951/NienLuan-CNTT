@extends('admin.layouts.main')
@section('title', 'Admin | Quản lý Coupon')
@section('content')
<div class="container-fluid pt-4 px-4">
<div class="row g-4">
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4 fs-3">Danh sách Coupon</h6>
        <div class="table-responsive">
            <div id="toolbar" class="btn-group">
                <a href="{{URL::to('/admin/coupon-add')}}" class="btn btn-success">
                    <i class="glyphicon glyphicon-plus"></i> Thêm Coupon
                </a>
            </div>
            <table data-toolbar="#toolbar" data-toggle="table" class="table table-hover">
                <thead>
                    <tr>
                        <th style="">
                            <div class="th-inner sortable">ID</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="">
                            <div class="th-inner sortable">Mã Coupon</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="">
                            <div class="th-inner ">Value</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="">
                            <div class="th-inner sortable">Trạng thái</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="">
                            <div class="th-inner ">Hành động</div>
                            <div class="fht-cell"></div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_coupon as $coupon)
                    @if($coupon->status<2)

                    <tr data-index="0">
                        <td style="">{{$coupon->coupon_id}}</td>
                        <td style="">{{$coupon->code}}</td>
                        <td style="">{{$coupon->value}}%</td>
                        <td style="">@if($coupon->status==1)Còn hạn @else Hết hạn @endif</td>
                        <td class="form-group" style="">
                            <a href="{{URL::to('/admin/coupon-edit/'.$coupon->coupon_id)}}" class="btn btn-primary">
                                <i class="fas fa-pen"></i>
                            </a>
                            <a  onclick="return confirm('Bạn có muốn xóa coupon này?')"  href="{{URL::to('/admin/coupon-delete/'.$coupon->coupon_id)}}" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
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
            <h6 class="mb-4 fs-3">Danh sách Coupon đã xóa</h6>
            <div class="table-responsive">
                <table data-toolbar="#toolbar" data-toggle="table" class="table table-hover">
                    <thead>
                        <tr>
                            <th style="">
                                <div class="th-inner sortable">ID</div>
                                <div class="fht-cell"></div>
                            </th>
                            <th style="">
                                <div class="th-inner sortable">Mã Coupon</div>
                                <div class="fht-cell"></div>
                            </th>
                            <th style="">
                                <div class="th-inner ">Value</div>
                                <div class="fht-cell"></div>
                            </th>
                            <th style="">
                                <div class="th-inner sortable">Trạng thái</div>
                                <div class="fht-cell"></div>
                            </th>
                            
                            <th style="">
                                <div class="th-inner ">Hành động</div>
                                <div class="fht-cell"></div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_coupon as $coupon)
                        @if($coupon->status==2)
    
                        <tr data-index="0">
                            <td style="">{{$coupon->coupon_id}}</td>
                            <td style="">{{$coupon->code}}</td>
                            <td style="">{{$coupon->value}}%</td>
                            <td style="">@if($coupon->status==1)Còn hạn @else Hết hạn @endif</td>
                            <td class="form-group" style="">
                                <a onclick="return confirm('Bạn có muốn khôi phục coupon đã xóa này?')" href="{{URL::to('/admin/coupon-recover/'.$coupon->coupon_id)}}" class="btn btn-primary">
                                    <i class="fa fa-undo"></i>
                                </a>
                                <a onclick="return confirm('Hành động ảnh hưởng đến cơ sở dữ liệu!!! Bạn có muốn xóa vĩnh viễn coupon này khỏi cơ sở dữ liệu?')" href="{{URL::to('/admin/coupon-deletedb/'.$coupon->coupon_id)}}" class="btn btn-danger">
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