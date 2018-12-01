@extends('admin.layout.index')

@section('content')
<script src="public/admin_asset/dist/js/extra.js"></script>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small> Danh sách</small>
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
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Level</th>
                        <th class="text-center">Delete</th>
                        <th class="text-center">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $u)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $u->id }}</td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>
                                @if($u->quyen == 1)
                                    {{ 'Admin' }}
                                @else
                                    {{ 'Tài khoản thường' }}
                                @endif
                            </td>
                            <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/user/xoa/{{ $u->id }}">Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/user/sua/{{ $u->id }}">Edit</a></td>
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