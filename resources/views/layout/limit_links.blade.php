<?php
// config
$link_limit = 7; // maximum number of links (a little bit inaccurate, but will be ok for now)
?>
@if ($tintuc->lastPage() > 1)
    <div class="row text-center">
        <ul class="pagination">
            <li class="{{ ($tintuc->currentPage() == 1) ? ' disabled' : '' }}">
                <a href="{{ $tintuc->url(1) }}">First</a>
             </li>
            @for ($i = 1; $i <= $tintuc->lastPage(); $i++)
                <?php
                $half_total_links = floor($link_limit / 2);
                $from = $tintuc->currentPage() - $half_total_links;
                $to = $tintuc->currentPage() + $half_total_links;
                if ($tintuc->currentPage() < $half_total_links) {
                   $to += $half_total_links - $tintuc->currentPage();
                }
                if ($tintuc->lastPage() - $tintuc->currentPage() < $half_total_links) {
                    $from -= $half_total_links - ($tintuc->lastPage() - $tintuc->currentPage()) - 1;
                }
                ?>
                @if ($from < $i && $i < $to)
                    <li class="{{ ($tintuc->currentPage() == $i) ? ' active' : '' }}">
                        <a href="{{ $tintuc->url($i) }}">{{ $i }}</a>
                    </li>
                @endif
            @endfor
            <li class="{{ ($tintuc->currentPage() == $tintuc->lastPage()) ? ' disabled' : '' }}">
                <a href="{{ $tintuc->url($tintuc->lastPage()) }}">Last</a>
            </li>
        </ul>
    </div>
@endif