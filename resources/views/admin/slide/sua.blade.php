@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
                    <small> {{$slide->Ten}} </small>
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
                <!-- Thông báo lỗi đuôi upload file -->
                @if(session('loi'))
                    <div class="alert alert-danger">
                        <strong>{{session('loi')}}</strong>
                    </div>
                @endif
                <form action="admin/slide/sua/{{$slide->id}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <p><label>Tên</label></p>
                        <input class="form-control input-width" name="Ten" placeholder="Nhập tên slide.." value="{{$slide->Ten}}" />
                    </div>
                    <div class="form-group">
                        <p><label>Nội dung</label></p>
                        <textarea name="NoiDung" id="demo" class="form-control ckeditor" rows="3">
                            {{$slide->NoiDung}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <p><label>Link</label></p>
                        <input class="form-control input-width" name="link" placeholder="Nhập link.." value="{{$slide->link}}" />
                    </div>
                    <div class="form-group">
                        <p><label>Hình ảnh</label></p>
                        <p><img width="500px" src="public/upload/slide/{{$slide->Hinh}}"></p>
                        <input type="file" name="Hinh" class="form-control">
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