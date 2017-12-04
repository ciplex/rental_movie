<nav aria-label="Page navigation example"></nav>
@if ($paginator->hasPages())
<ul class="pagination">
<!-- previous link page -->
@if($paginator->onfirstPage())
<li class="page-item disabled">
        <span aria-hidden="true" class="page-link">&laquo;</span>
</li>
@else

<li class="page-item">
    <a href="{{$paginator->previousPageurl() }}" aria-label="Previous" class="page-link">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span></a>
</li>
@endif

<!-- pagination elements -->
@foreach ($elements as  $element):
@if(is_string($element))
<li class="page-item">
    <a class="page-link" href="#">{{ $element }}</a>
</li>
@endif

<!-- Array Of Links -->
@if(is_array($element))
@foreach($element as $page => $url)
@if ($page == $paginator->currentPage())
<li class="page-item active my-active">
    <span class="page-link">{{ $page }}</span>
</li>

@else
<li class="page-item">
    <a href="{{ $url }}" class="page-link">{{ $page }}</a>
</li>
@endif
@endforeach
@endif
@endforeach

<!-- Next LInk Page -->

@if($paginator->hasMorePages())
<li class="page-item">
    <a href="{{ $paginator->nextPageurl() }}" aria-label="Next" class="page-link">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span></a>
</li>
@else
<li class="page-item disabled">
        <span aria-hidden="true">&raquo;</span>
    </li>
@endif
</ul>
@endif
</nav>