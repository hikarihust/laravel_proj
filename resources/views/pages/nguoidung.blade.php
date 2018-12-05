@section('title')
	Quản lý Thông tin Người Dùng
@endsection

@extends('layout.index')

@section('content')
<script src="public/admin_asset/dist/js/extra.js"></script>
<!-- Page Content -->
<div class="container">

	<!-- slider -->
	<div class="row carousel-holder">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading"><h4>Thông tin tài khoản</h4></div>
				<div class="panel-body">
					@if(count($errors) > 0)
					<div class="alert alert-danger">
						@foreach($errors->all() as $err)
						<strong>{{ $err }}</strong><br/>                          
						@endforeach
					</div>
					@endif

					@if(session('thongtin'))
					<div class="alert alert-success">
						<strong>{{ session('thongtin') }}</strong>
					</div>
					@endif
					<form action="quan-ly-thong-tin" method="POST">
						{{ csrf_field() }}
						<div>
							<label>Họ tên</label>
							<input type="text" class="form-control" name="name" aria-describedby="basic-addon1" value=" {{$nguoidung->name}} ">
						</div>
						<br>
						<div>
							<label>Email</label>
							<input type="email" class="form-control" name="email" aria-describedby="basic-addon1" value=" {{$nguoidung->email}} " 
							readonly
							>
						</div>
						<br>	
	                  	<div class="form-group">
	                        <input type="checkbox" name="changePassword" id="changePassword">
	                        <label> Đổi mật khẩu </label>
	                        <input type="password" class="form-control input-width password" name="password" placeholder="Nhập mật khẩu.." disabled />
	                    </div>
						<div class="form-group">
							<p><label>Xác nhận Mật khẩu</label></p>
							<input class="form-control input-width password" type="password" name="passwordAgain" placeholder="Nhập lại mật khẩu" disabled="" />
						</div>
						<br>
						<button type="submit" class="btn btn-primary"> Sửa
						</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-2">
		</div>
	</div>
	<!-- end slide -->
</div>
<!-- end Page Content -->
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