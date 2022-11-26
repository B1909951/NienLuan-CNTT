@extends('admin.layouts.main')
@section('title', 'Admin | Quản lý thể loại')
@section('content')
<div class="container-fluid pt-4 px-4">
<div class="row g-4">
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4 fs-3">Danh sách thể loại</h6>
        <div class="table-responsive">
            <div id="toolbar" class="btn-group">
                <a href="{{URL::to('/admin/genre-add')}}" class="btn btn-success">
                    <i class="glyphicon glyphicon-plus"></i> Thêm thể loại
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
                            <div class="th-inner sortable">Tên thể loại</div>
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
                    @foreach ($all_genre as $genre)
                    @if($genre->show<2)

                    <tr data-index="0">
                        <td style="">{{$genre->id}}</td>
                        <td style="">{{$genre->name}}</td>
                        <td style="">{{$genre->desc}}</td>
                        <td style="">@if($genre->show==1)Có@else Không @endif</td>
                        <td class="form-group" style="">
                            <a href="{{URL::to('/admin/genre-edit/'.$genre->id)}}" class="btn btn-primary">
                                <i class="fas fa-pen"></i>
                            </a>
                            <a  onclick="return confirm('Bạn có muốn xóa thể loại này?')"  href="{{URL::to('/admin/genre-delete/'.$genre->id)}}" class="btn btn-danger">
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
            <h6 class="mb-4 fs-3">Danh sách thể loại đã xóa</h6>
            <div class="table-responsive">
                <table data-toolbar="#toolbar" data-toggle="table" class="table table-hover">
                    <thead>
                        <tr>
                            <th style="">
                                <div class="th-inner sortable">ID</div>
                                <div class="fht-cell"></div>
                            </th>
                            <th style="">
                                <div class="th-inner sortable">Tên thể loại</div>
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
                        @foreach ($all_genre as $genre)
                        @if($genre->show==2)
    
                        <tr data-index="0">
                            <td style="">{{$genre->id}}</td>
                            <td style="">{{$genre->name}}</td>
                            <td style="">{{$genre->desc}}</td>
                            <td style="">@if($genre->show==1)Có@else Không @endif</td>
                            <td class="form-group" style="">
                                <a onclick="return confirm('Bạn có muốn khôi phục thể loại đã xóa này?')" href="{{URL::to('/admin/genre-recover/'.$genre->id)}}" class="btn btn-primary">
                                    <i class="fa fa-undo"></i>
                                </a>
                                <a onclick="return confirm('Hành động ảnh hưởng đến cơ sở dữ liệu!!! Bạn có muốn xóa vĩnh viễn thể loại này khỏi cơ sở dữ liệu?')" href="{{URL::to('/admin/genre-deletedb/'.$genre->id)}}" class="btn btn-danger">
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