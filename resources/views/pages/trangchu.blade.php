@section('title')
    Trang Chủ
@endsection

@extends('layout.index')

@section('content')
<!-- Page Content -->
    <div class="container">

     

        <div class="space20"></div>


        <div class="row main-left">
            @include('layout.menu')



            <div class="col-md-9">
                <div class="panel panel-default">            
                    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                        <h2 style="margin-top:0px; margin-bottom:0px;">Laravel Tin Tức</h2>
                    </div>

                    <div class="panel-body">











                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection