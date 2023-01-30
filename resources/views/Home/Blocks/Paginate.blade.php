<nav aria-label="navigation">
    <ul class="pagination justify-content-end mt-50">
        @foreach ($elements as $element)
            @if(is_array($element))
                @foreach ($element as $page => $url)
                    @if($page == $paginator->currentPage())
                        <li class="page-item active"><a class="page-link" href="{{$url}}">{{$page}}</a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{$url}}">{{$page}}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
    </ul>
</nav>