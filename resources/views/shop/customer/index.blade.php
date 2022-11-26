@extends('shop.layouts.sub')
@section('title', 'S-Book | Khách hàng')
@section('content')

<div class="col-sm-9 padding-right">
    <h2 class="title text-center">Chào mừng quý khách đến với Shop</h2>
    <section id="form" style="margin-top:0px;"><!--form-->
        <div class="container">
            <div class="row ">
                <div class="col-sm-7 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2><b>Thông tin</b> </h2>
                        <form action="{{URL::to('/customer-edit')}}" role="form" method="post">
                            @csrf
                            <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<div class="alert alert-warning">'.$message.'</div>' ;
                                Session::put('message',null);
                            }
                            ?>
                            <label for="">Tên:</label>
                            <input type="text" placeholder="Nguyễn Văn A" name="name" value="{{$customer->name}}" required/>
                            <label for="">Email (Không thể thay đổi):</label>
                            <input type="email" placeholder="vd123@mail.com" name="email" value="{{$customer->email}}" readonly/>
                            <label for="">Mật khẩu:</label>
                            <input type="password" placeholder="Password" name="password" value="{{$customer->password}}" required/>
                            <label for="">Số điện thoại:</label>
                            <input type="text" placeholder="0123456789" name="phone" value="{{$customer->phone}}" required/>
                            <button type="submit" class="btn btn-default">Cập nhật</button>
                        </form>
                    </div><!--/login form-->
                </div>
                
            </div>
        </div>
    </section><!--/form-->
</div>
@endsection



