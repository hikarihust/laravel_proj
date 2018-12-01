@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small> {{$user->name}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

                <!-- Check các lỗi nhập liệu như bao nhiêu ký tự, bắt buộc nhập (nếu có) -->
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            <strong>{{$err}}</strong><br>
                        @endforeach
                    </div>
                @endif

                <!-- Thông báo công việc đã được thực hiện -->
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        <strong>{{session('thongbao')}}</strong>
                    </div>
                @endif
                <form action="admin/user/sua/{{$user->id}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <p><label> Họ tên</label></p>
                        <input class="form-control input-width" name="name" placeholder="Nhập tên người dùng.." value="{{$user->name}}" />
                    </div>

                    <div class="form-group">
                        <p><label> Email </label></p>
                        <input type="email" class="form-control input-width" name="email" placeholder="Nhập địa chỉ email.." value="{{$user->email}}" readonly />
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="changePassword" id="changePassword">
                        <label> Đổi mật khẩu </label>
                        <input type="password" class="form-control input-width password" name="password" placeholder="Nhập mật khẩu.." disabled />
                    </div>

                    <div class="form-group">
                        <p><label> Nhập lại mật khẩu </label></p>
                        <input type="password" class="form-control input-width password" name="passwordAgain" placeholder="Nhập lại mật khẩu.." disabled />
                    </div>

                    <div class="form-group">
                        <p><label>Quyền người dùng</label></p>
                        <label class="radio-inline">
                            <input name="quyen" value="0" 
                                @if($user->quyen == 0)
                                    {{"checked"}}
                                @endif
                                type="radio">Tài khoản thường
                        </label>
                        <label class="radio-inline">
                            <input name="quyen" value="1" 
                                @if($user->quyen == 1)
                                    {{"checked"}}
                                @endif
                                type="radio">Admin
                        </label>
                    </div>
                    
                    <button type="submit" class="btn btn-default">Sửa</button>

                    <button type="reset" class="btn btn-default btn-mleft">Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#changePassword").change(function(){
                if ($(this).is(":checked")) {
                    $(".password").removeAttr('disabled');
                }else{
                    $(".password").prop('disabled',true);
                }
            });
        });
    </script>
@endsection