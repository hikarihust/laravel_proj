@extends('admin.layout.index')

@section('content')
<script src="public/admin_asset/dist/js/extra.js"></script>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
                    <small> danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="clearfix"></div>






            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th class="text-center">ID</th>
                        <th class="text-center">Tiêu đề</th>
                        <th class="text-center">Tóm tắt </th>
                        <th class="text-center">Thể loại</th>
                        <th class="text-center">Loại tin</th>   
                        <th class="text-center">Xem</th>   
                        <th class="text-center">Nổi bật</th>   
                        <th class="text-center">Delete</th>   
                        <th class="text-center">Edit</th>   
                    </tr>
                </thead>
                <tbody>
                    @foreach($tintuc as $tt)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $tt->id }}</td>
                            <td>
                                <p>{{ $tt->TieuDe }}</p>
                                <img src="public/upload/tintuc/{{$tt->Hinh}}" width="100%" height="auto">
                            </td>
                            <td>{{ $tt->TomTat }}</td>
                            <td>{{ $tt->LoaiTin->TheLoai->Ten }}</td>
                            <td>{{ $tt->LoaiTin->Ten }}</td>
                            <td>{{ $tt->SoLuotXem }}</td>
                            <td>
                                @if($tt->NoiBat == 0)
                                    {{'Không'}}
                                @else
                                    {{'Có'}}
                                @endif
                            </td>
                            <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/tintuc/xoa/{{ $tt->id }}">Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/tintuc/sua/{{ $tt->id }}">Edit</a></td>
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