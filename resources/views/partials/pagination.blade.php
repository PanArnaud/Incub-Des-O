<?php

$link_limit = 7; 

?>

@if ($paginator->lastPage() > 1)
    <ul class="ui pagination menu">
        <a class="{{ ($paginator->currentPage() == 1) ? ' disabled item' : 'item' }}" href="{{ $paginator->url(1) }}">Début</i>
        </a>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <?php
            $half_total_links = floor($link_limit / 2);
            $from = $paginator->currentPage() - $half_total_links;
            $to = $paginator->currentPage() + $half_total_links;
            if ($paginator->currentPage() < $half_total_links) {
               $to += $half_total_links - $paginator->currentPage();
            }
            if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
            }
            ?>
            @if ($from < $i && $i < $to)
                <a class="{{ ($paginator->currentPage() == $i) ? 'active item' : 'item' }}" href="{{ $paginator->url($i) }}">{{ $i }}</a>
            @endif
        @endfor
        <a href="{{ $paginator->url($paginator->lastPage()) }}" class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled item' : 'item' }}">Fin
        </a>
    </ul>
@endif