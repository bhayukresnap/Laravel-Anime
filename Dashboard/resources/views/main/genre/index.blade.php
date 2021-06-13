@extends('main.template.body')

@section('breadcrumb')
	{{Breadcrumbs::render('genres')}}
@endsection

@section('body')
<section class="anime-details spad">
	<div class="container">
		<div class="anime__details__content">
			<div class="row">
				<div class="col-12">
					<div class="d-flex flex-wrap">
						@foreach($genres as $genre)
							<div class="anime__details__btn mb-2">
								<a href="{{route('genres.detail', ['slug' => $genre->meta->slug])}}" class="follow-btn">{{$genre->name}}</a>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection