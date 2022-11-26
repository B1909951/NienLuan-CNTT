@extends('admin.layouts.main')
@section('title', 'Admin | Quản lý danh mục')
@section('content')
<div class="container-fluid pt-4 px-4">
<div class="row g-4">
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4 fs-3">Danh sách danh mục</h6>
        <div class="table-responsive">
            <div id="toolbar" class="btn-group">
                <a href="{{URL::to('/admin/cate-add')}}" class="btn btn-success">
                    <i class="glyphicon glyphicon-plus"></i> Thêm danh mục
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
                            <div class="th-inner sortable">Tên danh mục</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="">
                            <div class="th-inner ">Mô tả</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="">
                            <div class="th-inner sortable">Hiển thị</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="">
                            <div class="th-inner ">Hành động</div>
                            <div class="fht-cell"></div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_cate as $cate)
                    @if($cate->show<2)

                    <tr data-index="0">
                        <td style="">{{$cate->id}}</td>
                        <td style="">{{$cate->name}}</td>
                        <td style="">{{$cate->desc}}</td>
                        <td style="">@if($cate->show==1)Có@else Không @endif</td>
                        <td class="form-group" style="">
                            <a href="{{URL::to('/admin/cate-edit/'.$cate->id)}}" class="btn btn-primary">
                                <i class="fas fa-pen"></i>
                            </a>
                            <a  onclick="return confirm('Bạn có muốn xóa danh mục này?')"  href="{{URL::to('/admin/cate-delete/'.$cate->id)}}" class="btn btn-danger">
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
            <h6 class="mb-4 fs-3">Danh sách danh mục đã xóa</h6>
            <div class="table-responsive">
                
                <table data-toolbar="#toolbar" data-toggle="table" class="table table-hover">
                    <thead>
                        <tr>
                            <th style="">
                                <div class="th-inner sortable">ID</div>
                                <div class="fht-cell"></div>
                            </th>
                            <th style="">
                                <div class="th-inner sortable">Tên danh mục</div>
                                <div class="fht-cell"></div>
                            </th>
                            <th style="">
                                <div class="th-inner ">Mô tả</div>
                                <div class="fht-cell"></div>
                            </th>
                            <th style="">
                                <div class="th-inner sortable">Hiển thị</div>
                                <div class="fht-cell"></div>
                            </th>
                            <th style="">
                                <div class="th-inner ">Hành động</div>
                                <div class="fht-cell"></div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_cate as $cate)
                        @if($cate->show==2)
                        <tr data-index="0">
                            <td style="">{{$cate->id}}</td>
                            <td style="">{{$cate->name}}</td>
                            <td style="">{{$cate->desc}}</td>
                            <td style="">@if($cate->show==1)Có@else Không @endif</td>
                            <td class="form-group" style="">
                                <a onclick="return confirm('Bạn có muốn khôi phục danh mục đã xóa này?')"  href="{{URL::to('/admin/cate-recover/'.$cate->id)}}" class="btn btn-primary">
                                    <i class="fa fa-undo"></i>
                                </a>
                                <a onclick="return confirm('Hành động ảnh hưởng đến cơ sở dữ liệu!!! Bạn có muốn xóa vĩnh viễn danh mục này khỏi cơ sở dữ liệu?')" href="{{URL::to('/admin/cate-deletedb/'.$cate->id)}}" class="btn btn-danger">
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