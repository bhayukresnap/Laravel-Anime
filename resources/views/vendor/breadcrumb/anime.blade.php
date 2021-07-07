@unless ($breadcrumbs->isEmpty())
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    @foreach ($breadcrumbs as $breadcrumb)
                        @if (!is_null($breadcrumb->url) && !$loop->last)
                            <a href="{{ $breadcrumb->url }}">{!! $breadcrumb->title !!}</a>
                        @else
                            <span>{{ $breadcrumb->title }}</span>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endunless