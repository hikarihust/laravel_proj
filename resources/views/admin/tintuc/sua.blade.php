@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
                    <small> {{ $tintuc->TieuDe }}</small>
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

                @if(session('xoaComment'))
                    <div class="alert alert-success">
                        <strong>{{ session('xoaComment') }}</strong>
                    </div>
                @endif
                <!-- Thông báo lỗi đuôi upload file -->
                @if(session('loi'))
                    <div class="alert alert-danger">
                        <strong>{{session('loi')}}</strong>
                    </div>
                @endif
                <form action="admin/tintuc/sua/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <p><label>Thể Loại</label></p>
                        <select class="form-control input-width" name="TheLoai" id="TheLoai">
                            @foreach($theloai as $tl)
                                <option 
                                    @if($tintuc->LoaiTin->TheLoai->id == $tl->id)
                                        {{"selected"}}
                                    @endif
                                value="{{ $tl->id }}">{{ $tl->Ten }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <p><label>Loại tin</label></p>
                        <select class="form-control input-width" name="LoaiTin" id="LoaiTin">
                            @foreach($loaitin as $lt)
                                <option 
                                    @if($tintuc->idLoaiTin == $lt->id)
                                        {{"selected"}}
                                    @endif
                                value="{{ $lt->id }}">{{ $lt->Ten }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <p><label>Tiêu đề</label></p>
                        <input class="form-control input-width" name="TieuDe" placeholder="Nhập tiêu đề.." value="{{$tintuc->TieuDe}}" />
                    </div>
                    <div class="form-group">
                        <p><label>Tóm Tắt</label></p>
                        <textarea name="TomTat" id="demo" class="form-control ckeditor" rows="3">
                            {{$tintuc->TomTat}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <p><label>Nội dung</label></p>
                        <textarea name="NoiDung" id="demo" class="form-control ckeditor" rows="5">
                            {{$tintuc->NoiDung}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <p><label>Hình ảnh</label></p>
                        <p>
                            <img width="400px" src="public/upload/tintuc/{{$tintuc->Hinh}}">
                        </p>
                        <input type="file" name="Hinh" class="form-control">
                    </div>
                    <div class="form-group">
                        <p><label>Nổi bật?</label></p>
                        <label class="radio-inline">
                            <input name="NoiBat" value="0" 
                            @if($tintuc->NoiBat == 0)
                                {{"checked"}}
                            @endif
                            type="radio">Không
                        </label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="1" 
                            @if($tintuc->NoiBat == 1)
                                {{"checked"}}
                            @endif
                            type="radio">Có
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default btn-mleft">Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bình luận
                    <small> danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="clearfix"></div>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th class="text-center">ID</th>
                        <th class="text-center">Người dùng</th>
                        <th class="text-center">Nội dung</th>
                        <th class="text-center">Ngày đăng</th>
                        <th class="text-center">Delete</th>   
                    </tr>
                </thead>
                <tbody>
                    @foreach($tintuc->Comment as $cm)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $cm->id }}</td>
                            <td>{{ $cm->User->name }}</td>
                            <td>{{ $cm->NoiDung}}</td>
                            <td>{{ $cm->created_at }}</td>
                            <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/comment/xoa/{{ $cm->id }}/{{$tintuc->id}}">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection

@section('script')
   <script>
       $(document).ready(function(){
            $('#TheLoai').change(function(){
                var idTheLoai = $(this).val();
                $.get("admin/ajax/loaitin/"+idTheLoai,function(data){
                    $("#LoaiTin").html(data);
                });
            });
       })
   </script> 
@endsection