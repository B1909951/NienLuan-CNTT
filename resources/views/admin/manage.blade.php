@extends('admin.layouts.main')
@section('title', 'Admin | Quản lý nhân viên')
@section('content')
<div class="container-fluid pt-4 px-4">
<div class="row g-4">
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4 fs-3">Tài khoản nhân viên</h6>
        <div class="table-responsive">
            <div id="toolbar" class="btn-group">
                <a href="{{URL::to('/admin-add')}}" class="btn btn-success">
                    <i class="glyphicon glyphicon-plus"></i> Thêm tài khoản
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
                            <div class="th-inner sortable">Họ &amp; Tên</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="">
                            <div class="th-inner ">Ảnh đại diện</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="">
                            <div class="th-inner sortable">Email</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="">
                            <div class="th-inner ">Số điện thoại</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="">
                            <div class="th-inner ">Hành động</div>
                            <div class="fht-cell"></div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_admin as $ad)
                    <tr data-index="0">
                        <td style="">{{$ad->id}}</td>
                        <td style="">{{$ad->name}}</td>
                        <td style="">
                            <img width="200" src="{{asset("/assets/admin/img/$ad->avatar")}}" width="150">
                        </td>
                        <td style="">{{$ad->email}}</td>
                        <td style="">{{$ad->phone}}</td>
                        <td class="form-group" style="">
                            <a href="{{URL::to('/admin-edit/'.$ad->id)}}" class="btn btn-primary">
                                <i class="fas fa-pen"></i>
                            </a>
                            <a  onclick="return confirm('Bạn có muốn xóa nhân viên này?')" href="{{URL::to('/admin-delete/'.$ad->id)}}" class="btn btn-danger">
                                <i class="fas fa-times"></i>
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