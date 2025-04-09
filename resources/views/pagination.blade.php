@if ($total_pages > 1)
<nav class="pagination" role="navigation" aria-label="Pagination Navigation">
    <ul>
        @for ($i = 1; $i <= $total_pages; $i++)
            <li>
                <a href="{{ url('?term=' . $term . '&show=' . $show . '&from=' . (($i - 1) * $show)) }}"
                   class="btn @if ($i == $current_page) active @endif"
                   @if ($i == $current_page) aria-current="true" @endif>
                    {{ $i }}
                </a>
            </li>
        @endfor
    </ul>
</nav>
@endif