@extends('admin.layouts.main')
@section('title', 'Admin | Sửa thể loại')
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
                    <form action="{{URL::to('/admin/genre-edit-genre')}}" role="form" method="post" >
                        @csrf
                        <input id="id" name="id" type="hidden"  placeholder="" value="{{$genre_edit->id}}">
                        <div class="form-group">
                            <label>Tên thể loại</label>
                            <input name="name" class="form-control" placeholder="" value="{{$genre_edit->name}}" required>
                        </div>
                        <div class="form-group mb-2">
                            <label>Mô tả</label>
                            <input name="desc" type="text" class="form-control" value="{{$genre_edit->desc}}" required> 
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Hiển thị</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input1" type="radio" name="show"
                                        id="gridRadios1" value=0 @if(!$genre_edit->show) checked @endif>
                                    <label class="form-check-label" for="gridRadios1">
                                        Không
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input1" type="radio" name="show"
                                        id="gridRadios2" value=1 @if($genre_edit->show) checked @endif>
                                    <label class="form-check-label" for="gridRadios2">
                                        Có
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        
                        <button name="sbm" type="submit" class="btn btn-success">Cập nhật</button>
                        <button type="reset" class="btn btn-success">Làm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection