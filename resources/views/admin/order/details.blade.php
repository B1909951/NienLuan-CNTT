@extends('admin.layouts.main')
@section('title', 'Admin | Chi tiết đơn hàng')
@section('content')
<div class="container-fluid pt-4 px-4">
<div class="row g-4">
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4 fs-3">Chi tiết đơn hàng</h6>
        <div class="table-responsive">
            <table data-toolbar="#toolbar" data-toggle="table" class="table table-hover">
                <thead>
                    <tr>
                        <th style="">
                            <div class="th-inner sortable">ID</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="">
                            <div class="th-inner sortable">Tên</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="">
                            <div class="th-inner "></div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="">
                            <div class="th-inner sortable">Giá</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="">
                            <div class="th-inner sortable">Thể loại</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="">
                            <div class="th-inner sortable">Danh mục</div>
                            <div class="fht-cell"></div>
                        </th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_details as $pro)
                    @if($pro->show<2)
                    <tr data-index="0">
                        <td style="">{{$pro->id}}</td>
                        <td style="">{{$pro->name}}</td>
                        <td style="">
                            <img width="100" src="{{asset("/assets/clients/pro_img/$pro->image")}}" width="75">
                        </td>
                        
                        <td style="">{{number_format($pro->price, 0, '.',',').' vnđ'}}</td>
                        
                        
                        <td style="">
                            
                            @foreach ($all_genre as $genre)
                            <div>
                                @if($genre->product_id == $pro->id)•{{$genre->name}}@endif
                            </div>
                            @endforeach
                        </td>
                        <td style="">
                            @foreach ($all_category as $cate)
                            <div>
                                @if($cate->id == $pro->cate_id){{$cate->name}} @endif
                            </div>
                            @endforeach
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