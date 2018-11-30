@extends('admin.layout.index')

@section('content')
<script src="public/admin_asset/dist/js/extra.js"></script>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
                    <small> danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="clearfix"></div>
            @if(session('thongbao'))
                <div class="alert alert-success">
                    <strong>{{ session('thongbao') }}</strong>
                </div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th class="text-center">ID</th>
                        <th class="text-center">Tên</th>
                        <th class="text-center">Nội dung</th>
                        <th class="text-center">Hình</th>
                        <th class="text-center">link</th>
                        <th class="text-center">Delete</th>
                        <th class="text-center">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($slide as $sd)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $sd->id }}</td>
                            <td>{{ $sd->Ten }}</td>
                            <td>{{ $sd->NoiDung }}</td>
                            <td>
                                <img width="400px" height="auto" src="public/upload/slide/{{ $sd->Hinh }}">
                            </td>
                            <td>{{ $sd->link }}</td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/slide/xoa/{{ $sd->id }}">Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/slide/sua/{{ $sd->id }}">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<!-- Modal -->
<!-- Modal -->

@endsection