
@if ($paginator->hasPages())
<div class="col-12 my-5">
        <nav aria-label="Page Navigation">
        <ul class="pagination justify-content-center">

            @if (!$paginator->onFirstPage())
            <li class="page-item">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true" rel="prev">Previous</a>
            </li>
            @else
            <li class="page-item disabled">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            @endif


@foreach ($elements as $element)
           
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page">
                            <a class="page-link">{{$page}}<span class="sr-only">(current)</span></a>
                        </li>

                    @else
                       <li class="page-item" aria-current="page">
                            <a class="page-link" href="{{$url}}">{{$page}}<span class="sr-only">(current)</span></a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach





            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link" href="#" rel="next">Next</a>
                </li>
            @endif
        </ul>
        </nav>
    </div>
@endif