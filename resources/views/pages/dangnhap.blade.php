@section('title')
    Đăng Nhập
@endsection

@extends('layout.index')

@section('content')
<!-- Page Content -->
<div class="container">

    <!-- slider -->
    <div class="row carousel-holder">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Đăng nhập</h4></div>
                <div class="panel-body">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}} <br>
                            @endforeach
                        </div>
                    @endif

                    @if(session('thongbao'))
                        <div class="alert alert-danger">
                            <strong> {{session('thongbao')}} </strong>
                        </div>
                    @endif
                    <form action="dangnhap" method="POST">
                        {{ csrf_field() }}
                        <div>
                            <label>Email</label>
                            <input type="email" class="form-control input" placeholder="Địa Chỉ Email" name="email" value=""
                            >
                        </div>

                        <br>    
                        <div>
                            <label>Mật khẩu</label>
                            <input type="password" class="form-control" placeholder="Mật Khẩu" name="password">
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Đăng nhập</button>    
                        </div>
                        <div class="form-group" style="text-align: right; margin-bottom: 3em;">
                            <a href="#">Quên Mật Khẩu?</a>    
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
    <!-- end slide -->
</div>
<!-- end Page Content -->
@endsection