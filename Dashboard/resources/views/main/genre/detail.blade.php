@extends('main.template.body')

@section('breadcrumb')
{{Breadcrumbs::render('genres.detail', $genre)}}
@endsection	

@section('body')
<section class="product-page spad">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="product__page__content">
					<div class="product__page__title">
						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-6">
								<div class="section-title">
									<h4>{{$genre->name}}</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						@foreach($animes as $anime)
						@include('main.template.anime', ['anime' => $anime])
						@endforeach
					</div>
				</div>
				{{ $animes->appends(request()->input())->onEachSide(3)->links('vendor.pagination.anime') }}
			</div>

		</div>
	</div>
</section>
@endsection