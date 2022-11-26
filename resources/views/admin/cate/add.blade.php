@extends('admin.layouts.main')
@section('title', 'Admin | Thêm danh mục')
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
                    <form action="{{URL::to('/admin/cate-add-cate')}}" role="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input id="name" name="name" class="form-control" type="text" placeholder="" required>
                            <span class="form-message"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label>Mô tả</label>
                            <input id="desc" name="desc" class="form-control" type="text" placeholder="" required>
                            <span class="form-message"></span>
                        </div>
                        <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
                        <button type="reset" class="btn btn-success">Làm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection