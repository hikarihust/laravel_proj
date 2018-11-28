@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại tin
                    <small>{{ $loaitin->Ten }}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            <strong>{{$err}}</strong><br/>
                        @endforeach
                    </div>
                @endif

                @if(session('thongbao'))
                    <div class="alert alert-success">
                        <strong>{{ session('thongbao') }}</strong>
                    </div>
                @endif
                <form action="admin/loaitin/sua/{{$loaitin->id}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <p>
                            <label>Thể Loại</label>
                        </p>
                        <select class="form-control input-width" name="TheLoai">
                            @foreach($theloai as $tl)
                                <option 
                                    @if($loaitin->idTheLoai == $tl->id)
                                        {{'selected'}}
                                    @endif
                                    value="{{$tl->id}}"> {{$tl->Ten}} 
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <p>
                            <label>Tên loại tin</label>
                        </p>
                        <input class="form-control" name="Ten" placeholder="Nhập tên loại tin" value="{{$loaitin->Ten}}">
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
<!-- /#page-wrapper -->
@endsection