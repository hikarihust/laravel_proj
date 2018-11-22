@extends('admin.layout.index')

@section('content')
<script src="admin_asset/dist/js/extra.js"></script>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thể Loại
                    <small>> Danh Sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="clearfix"></div>









            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th class="text-center">ID</th>
                        <th class="text-center">Tên Thể Loại</th>
                        <th class="text-center">Tên Không Dấu</th>
                        <th class="text-center">Sửa</th>
                        <th class="text-center">Xóa</th>
                    </tr>
                </thead>
                <tbody>










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