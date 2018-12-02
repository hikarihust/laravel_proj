<div class="col-md-3 ">
    <ul class="list-group" id="menu">
        <li href="#" class="list-group-item menu1 active">
            Menu
        </li>
        @foreach($theloai as $tl)
            @if(count($tl->LoaiTin) > 0)
                <li class="list-group-item menu1 cate-list">
                    {{$tl->Ten}}
                </li>
                <ul style="display: none;" class="level2">
                    @foreach($tl->LoaiTin as $lt)
                        <li class="list-group-item">
                            <a href="#"> {{$lt->Ten}}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        @endforeach
    </ul>
</div>