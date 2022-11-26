@extends('admin.layouts.main')
@section('title', 'Admin | Đơn hàng chưa duyệt')
@section('content')
<div class="container-fluid pt-4 px-4">
<div class="row g-4">
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4 fs-3">Danh sách đơn hàng chưa duyệt</h6>
        <div class="table-responsive">
            <table data-toolbar="#toolbar" data-toggle="table" class="table table-hover">
                <thead>
                    <tr>
                        <th style="">
                            <div class="th-inner sortable">ID</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="">
                            <div class="th-inner sortable">Tên KH</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="">
                            <div class="th-inner ">Code</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="">
                            <div class="th-inner ">Tổng tiền</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="">
                            <div class="th-inner sortable">Địa chỉ</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="">
                            <div class="th-inner ">Hình thức</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="">
                            <div class="th-inner ">Ngày đặt</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="">
                            <div class="th-inner ">Hành động</div>
                            <div class="fht-cell"></div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_order as $order)
                 
                    <tr data-index="0">
                        <td style="">
                            <p>{{$order->order_id}}</p>
                            <a href="{{URL::to('/admin/order-details/'.$order->order_id)}}">Xem chi tiết</a>
                        </td>
                        <td style="">
                            <p>{{$order->name}}</p>
                            <p>{{$order->phone}}</p>
                        </td>
                       
                        <td style="">
                            @if($order->code)
                                <p>{{$order->code}}</p>
                            <p>{{$order->value}}%</p>
                            @else
                                <p>Không</p>
                            @endif
                            

                        </td>
                        <td style="">{{number_format($order->total, 0, '.',',').' vnđ'}}</td>
                        <td style="">{{$order->address}}</td>
                        <td style="">{{$order->type}}</td>
                        <td style="">{{$order->created_at}}</td>

                        <td class="form-group" style="">
                            <a onclick="return confirm('Xác nhận duyệt đơn hàng này?')" href="{{URL::to('/admin/order-comfim/'.$order->order_id)}}" class="btn btn-primary">
                                <i class="fa fa-truck" aria-hidden="true"></i>
                                
                            </a>
                            <a  onclick="return confirm('Xác nhận hủy đơn hàng này?')"  href="{{URL::to('/admin/order-delete/'.$order->order_id)}}" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
    
</div>
</div>
</div>

@endsection