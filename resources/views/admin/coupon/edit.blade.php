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
                    <form action="{{URL::to('/admin/coupon-edit-coupon')}}" role="form" method="post" >
                        @csrf
                        <input id="id" name="id" type="hidden"  placeholder="" value="{{$coupon_edit->coupon_id}}">
                        <div class="form-group">
                            <label>Mã Coupon</label>
                            <input name="code" class="form-control" placeholder="" value="{{$coupon_edit->code}}" required>
                        </div>
                        <div class="form-group mb-2">
                            <label>Value</label>
                            <input name="value" min="0" max="100" type="number" class="form-control" value="{{$coupon_edit->value}}" required> 
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Tình trạng</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input1" type="radio" name="status"
                                        id="gridRadios1" value=0 @if(!$coupon_edit->status) checked @endif>
                                    <label class="form-check-label" for="gridRadios1">
                                        Hết hạn
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input1" type="radio" name="status"
                                        id="gridRadios2" value=1 @if($coupon_edit->status) checked @endif>
                                    <label class="form-check-label" for="gridRadios2">
                                        Còn hạn
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        
                        <button type="submit" class="btn btn-success">Cập nhật</button>
                        <button type="reset" class="btn btn-success">Làm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection