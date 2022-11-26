@extends('admin.layouts.main')
@section('title', 'Admin | Sửa thông tin nhân viên')
@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <div class="col-md-8">
                    <?php 
                    $error = Session::get('error');
                    if($error){
                        echo '<div class="alert alert-danger">'.$error.'</div>' ;
                        Session::put('error',null);
                    }
                    ?>
                    <form id="add-user" action="{{URL::to('/admin-edit-admin')}}" role="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <input id="id" name="id" type="hidden" class="form-control" placeholder="" value="{{$admin_edit->id}}">
                        <input id="now_avatar" name="now_avatar" type="hidden" class="form-control" placeholder="" value="{{$admin_edit->avatar}}">
                        <div class="form-group">
                            <label>Họ &amp; Tên</label>
                            <input id="name" name="name" class="form-control" placeholder="" value="{{$admin_edit->name}}">
                            <span class="form-message"></span>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input id="email" name="email" type="text" class="form-control" value="{{$admin_edit->email}}">
                            <span class="form-message"></span>
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input id="password" name="password" type="password" class="form-control" value="{{$admin_edit->password}}">
                            <span class="form-message"></span>
                        </div>
                        <div class="form-group">
                            <label>Nhập lại mật khẩu</label>
                            <input id="re_password" name="re_password" type="password" class="form-control"  value="{{$admin_edit->password}}">
                            <span class="form-message"></span>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input id="phone" name="phone" class="form-control" placeholder="" value="{{$admin_edit->phone}}">
                            <span class="form-message"></span>
                        </div>
                        <div class="form-group mb-3" >
                            <label>Ảnh đại diện</label> <br>

                            <input id="avatar" name="avatar" type="file" accept="image/*"  onchange="loadFile(event)">
                            <span class="form-message"></span> <br>
                            <img id="output" src="{{asset("/assets/admin/img/$admin_edit->avatar")}}" width="200">
                        </div>
                        <button name="sbm" type="submit" class="btn btn-success">Cập nhật</button>
                        <button type="reset" class="btn btn-success">Làm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection