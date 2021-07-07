@if ($paginator->hasPages())
	<div class="product__pagination">
		@if (!$paginator->onFirstPage())
			<a href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-angle-double-left"></i></a>
		@endif

		@foreach ($elements as $element)
			@if (is_string($element))
				<li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
			@endif
			@if (is_array($element))
				@foreach ($element as $page => $url)
					@if ($page == $paginator->currentPage())
						<a class="current-page">{{$page}}</a>
					@else
						<a href="{{ $url }}">{{$page}}</a>
					@endif
				@endforeach
			@endif
		@endforeach

		@if ($paginator->hasMorePages())
			<a href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-angle-double-right"></i></a>
		@endif

	</div>
@endif
