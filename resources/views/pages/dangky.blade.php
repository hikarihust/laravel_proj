@section('title')
	Đăng Ký
@endsection

@extends('layout.index')

@section('content')
<!-- Page Content -->
<div class="container">

	<!-- slider -->
	<div class="row carousel-holder">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
			<div class="panel panel-default">
			<div class="panel-heading"><h4>Đăng ký tài khoản</h4></div>
				<div class="panel-body">
					@if(count($errors) > 0)
                        @foreach($errors->all() as $err)
                            <div class="alert alert-danger">
                                <strong>{{ $err }}</strong><br/>
                            </div>
                        @endforeach
                    @endif
				
					@if(session('thongbao'))
						<div class="alert alert-success">
							<strong>{{ session('thongbao') }}</strong>
						</div>
					@endif
					<form method="POST" action="dangky">
						{{ csrf_field() }}
						<div>
							<label>Họ tên</label>
							<input type="text" class="form-control" placeholder="Nhập tên của bạn" name="name" aria-describedby="basic-addon1">
						</div>
						<br>
						<div>
							<label>Email</label>
							<input type="email" class="form-control" placeholder="Nhập Địa Chỉ Email" name="email" aria-describedby="basic-addon1"
							>
						</div>
						<br>	
						<div>
							<label>Nhập mật khẩu</label>
							<input type="password" class="form-control" name="password" aria-describedby="basic-addon1" placeholder="Nhập Mật Khẩu">
						</div>
						<br>
						<div>
							<label>Nhập lại mật khẩu</label>
							<input type="password" class="form-control" name="passwordAgain" aria-describedby="basic-addon1" placeholder="Nhập lại Mật Khẩu">
						</div>
						<br>
						<button type="submit" class="btn btn-primary">Đăng Ký
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