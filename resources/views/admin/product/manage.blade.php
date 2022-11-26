@extends('admin.layouts.main')
@section('title', 'Admin | Quản lý sản phẩm')
@section('content')
<div class="container-fluid pt-4 px-4">
<div class="row g-4">
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4 fs-3">Danh sách sản phẩm</h6>
        <div class="table-responsive">
            <div id="toolbar" class="btn-group">
                <a href="{{URL::to('/admin/product-add')}}" class="btn btn-success">
                    <i class="glyphicon glyphicon-plus"></i> Thêm sản phẩm
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
                       
                        <th style="">
                            <div class="th-inner ">View</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="">
                            <div class="th-inner ">Rate</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="">
                            <div class="th-inner ">Show</div>
                            <div class="fht-cell"></div>
                        </th>
                        
                        <th style="">
                            <div class="th-inner ">Hành động</div>
                            <div class="fht-cell"></div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_product as $pro)
                    @if($pro->show<2)
                    <tr data-index="0">
                        <td style="">{{$pro->id}}</td>
                        <td style="">{{$pro->name}}</td>
                        <td style="">
                            <img width="100" src="{{asset("/assets/clients/pro_img/$pro->image")}}" width="75">
                        </td>
                        
                        <td style="">{{number_format($pro->price, 0, '.',',').' vnđ'}}</td>
                        
                        
                        <td style="">
                            @foreach ($pro_genres as $genre)
                            <div>
                                @if($genre->product_id == $pro->id)•{{$genre->name}} @endif
                            </div>
                            @endforeach
                        </td>
                        <td style="">
                            @foreach ($categories as $cate)
                            <div>
                                @if($cate->id == $pro->cate_id){{$cate->name}} @endif
                            </div>
                            @endforeach
                        </td>
                        <td style="">{{$pro->view}}</td>
                        <td style="">{{$pro->star}}<i class="fa fa-star text-warning" ></i></td>
                        <td style="">@if($pro->show==1)Có @else Không @endif</td>


                        <td class="form-group" style="">
                            <a href="{{URL::to('/admin/product-edit/'.$pro->id)}}" class="btn btn-primary">
                                <i class="fas fa-pen"></i>
                            </a>
                            <a  onclick="return confirm('Bạn có muốn xóa sản phẩm này?')" href="{{URL::to('/admin/product-delete/'.$pro->id)}}" class="btn btn-danger">
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
            <h6 class="mb-4 fs-3">Danh sách sản phẩm đã xóa</h6>
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
                            <th style="">
                                <div class="th-inner ">View</div>
                                <div class="fht-cell"></div>
                            </th>
                            <th style="">
                                <div class="th-inner ">Rate</div>
                                <div class="fht-cell"></div>
                            </th>
                            <th style="">
                                <div class="th-inner ">Show</div>
                                <div class="fht-cell"></div>
                            </th>
                            
                            <th style="">
                                <div class="th-inner ">Hành động</div>
                                <div class="fht-cell"></div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_product as $pro)
                        @if($pro->show==2)
                        <tr data-index="0">
                            <td style="">{{$pro->id}}</td>
                            <td style="">{{$pro->name}}</td>
                            <td style="">
                                <img width="100" src="{{asset("/assets/clients/pro_img/$pro->image")}}" width="75">
                            </td>
                            
                            <td style="">{{number_format($pro->price, 0, '.',',').' vnđ'}}</td>
                            
                            
                            <td style="">
                                @foreach ($pro_genres as $genre)
                                <div>
                                    @if($genre->product_id == $pro->id)•{{$genre->name}} @endif
                                </div>
                                @endforeach
                            </td>
                            <td style="">
                                @foreach ($categories as $cate)
                                <div>
                                    @if($cate->id == $pro->cate_id){{$cate->name}} @endif
                                </div>
                                @endforeach
                            </td>
                            <td style="">{{$pro->view}}</td>
                            <td style="">{{$pro->star}}<i class="fa fa-star text-warning" ></i></td>
                            <td style="">@if($pro->show==1)Có @else Không @endif</td>
    
    
                            <td class="form-group" style="">
                                <a onclick="return confirm('Bạn có muốn khôi phục sản phẩm đã xóa này?')" href="{{URL::to('/admin/product-recover/'.$pro->id)}}" class="btn btn-primary">
                                    <i class="fa fa-undo"></i>
                                </a>
                                <a onclick="return confirm('Hành động ảnh hưởng đến cơ sở dữ liệu!!! Bạn có muốn xóa vĩnh viễn sản phẩm này khỏi cơ sở dữ liệu?')" href="{{URL::to('/admin/product-deletedb/'.$pro->id)}}" class="btn btn-danger">
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