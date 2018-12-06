<!-- Header -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="font-size: 1.4em;" href="#">tinnhanh.net</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Giới thiệu</a>
                    </li>
                    <li>
                        <a href="lienhe">Liên hệ</a>
                    </li>
                </ul>

                <form method="get" action="timkiem" class="navbar-form navbar-left" role="search">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <input type="text" name="tukhoa" class="form-control" placeholder="Tìm kiếm">
                    </div>
                    <button type="submit" class="btn btn-default">Tìm</button>
                </form>

                <ul class="nav navbar-nav pull-right">
                    @if(Auth::user())
                        <li>
                            <a href="nguoidung">
                                <span class="glyphicon glyphicon-user" style="word-spacing: -10px;">{{Auth::user()->name}}</span>
                            </a>
                        </li>

                        <li>
                            <a href="dangxuat">Dang xuat</a>
                        </li>
                    @else
                        <li>
                            <a href="dangky"> Dang ky</a>
                        </li>

                        <li>
                            <a href="dangnhap"> Dang nhap</a>
                        </li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<!-- End Header -->