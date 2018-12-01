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
                <a class="navbar-brand" style="font-size: 1.4em;" href="{{ url('/') }}">tinnhanh.net</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Giới thiệu</a>
                    </li>
                    <li>
                        <a href="lien-he">Liên hệ</a>
                    </li>
                </ul>

                <form method="GET" action="tim-kiem" class="navbar-form navbar-left" role="search">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <input type="text" name="keyword" class="form-control" placeholder="Bạn cần tìm gì?">
                    </div>
                    <button type="submit" class="btn btn-default">Tìm Kiếm</button>
                </form>








            </div>


            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<!-- End Header -->