@extends('shop.layouts.sub')
@section('title', 'S-Book | Đăng nhập và đăng kí')
@section('content')

<div class="col-sm-9 padding-right">
    <h2 class="title text-center">Đăng nhập để có thể sử dụng đầy đủ chức năng của shop</h2>
    <section id="form" style="margin-top:0px"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2><b>Đăng nhập</b> </h2>
                        
                        <form action="{{URL::to('/customer-login-test')}}" role="form" method="post">
                            @csrf
                            <label for="">Email:</label>
                            <input type="email" placeholder="vd123@mail.com" name="email" required/>
                            <label for="">Mật khẩu:</label>
                            <input type="password" placeholder="Password" name="password" required/>
                            <?php
                            $error_login = Session::get('error_login');
                            if($error_login){
                                echo '<div class="alert alert-danger">'.$error_login.'</div>' ;
                            }
                            ?>
                            
                            <button type="submit" class="btn btn-default" >Đăng nhập</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-3">
                    <div class="signup-form"><!--sign up form-->
                        <h2><b>Đăng kí</b></h2>
                        
                        <form action="{{URL::to('/customer-signup')}}" role="form" method="post">
                            @csrf
                            <label for="">Email:</label>
                            <input type="email" placeholder="vd123@mail.com" name="email" required/>
                            <label for="">Mật khẩu:</label>
                            <input type="password" placeholder="Password" name="password" required/>
                            <label for="">Tên:</label>
                            <input type="text" placeholder="Nguyễn Văn A" name="name" required/>
                            <label for="">Số điện thoại:</label>
                            <input type="text" placeholder="0123456789" name="phone" required/>
                            <?php
                            $error = Session::get('error');
                            if($error){
                                echo '<div class="alert alert-danger">'.$error.'</div>' ;
                            }
                            ?>
                            <button type="submit" class="btn btn-default">Đăng kí</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
</div>
@endsection



