@extends('admin.layouts.main')
@section('title', 'Admin | Thêm sản phẩm')
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
                    <form action="{{URL::to('/admin/product-add-product')}}" role="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input name="name" class="form-control" placeholder="" required>
                            <span class="form-message"></span>
                        </div>
                        <div class="form-group">
                            <label>Giá(vnđ)</label>
                            <input  name="price" type="number" min="0" class="form-control" required>
                            <span class="form-message"></span>
                        </div>
                        
                        <div class="form-group">
                            <label>Mô tả ngắn</label>

                            <textarea name="desc" class="form-control" placeholder=""
                                id="floatingTextarea" style="height: 50px;"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Chi tiết</label>

                            <textarea name="detail" class="form-control" placeholder=""
                                id="floatingTextarea" style="height: 50px;"></textarea>
                        </div>
                        
                        <label>Thể loại</label>

                        @foreach ($all_genre as $genre)
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="genres[]" type="checkbox" role="switch"
                                id="flexSwitchCheckDefault" value="{{$genre->id}}" >
                            <label class="form-check-label" for="flexSwitchCheckDefault">{{$genre->name}}</label>
                        </div>
                        @endforeach
                        <label>Danh mục sản phẩm</label>
                        <select class="form-select form-select-sm mb-3" name="cate" aria-label=".form-select-sm example">
                            @foreach ($categories as $cate)
                                <option value="{{$cate->id}}">{{$cate->name}}</option>
                                @endforeach
                        </select>
                        
                        <div class="form-group mb-3">
                            <label>Ảnh sản phẩm</label> <br>
                            <input  name="image"  type="file" accept="image/*" onchange="loadFile(event)" >
                            <span class="form-message"></span> <br>
                            <img id="output" src="" width="250">
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