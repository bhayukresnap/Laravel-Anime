@extends('main.template.body')

@section('breadcrumb')
	{{Breadcrumbs::render('animes.detail', $anime)}}
@endsection	

@section('body')
<section class="anime-details spad">
	<div class="container">
		<div class="anime__details__content">
			<div class="row">
				<div class="col-lg-3">
					<div class="anime__details__pic set-bg" data-setbg="{{$anime->photo}}"></div>
				</div>
				<div class="col-lg-9">
					<div class="anime__details__text">
						<div class="anime__details__title">
							<h3>{{$anime->name}}</h3>
							<span>{{$anime->japanese}} {{$anime->english}}</span>
						</div>
						<div class="anime__details__rating">
							<div class="rating">
								<a href="#"><i class="fa fa-star-o"></i></a>
								<a href="#"><i class="fa fa-star-o"></i></a>
								<a href="#"><i class="fa fa-star-o"></i></a>
								<a href="#"><i class="fa fa-star-o"></i></a>
								<a href="#"><i class="fa fa-star-o"></i></a>
							</div>
							<span>{{$anime->reviews->count()}}</span>
						</div>
						<p>{!! $anime->description !!}</p>
						<div class="anime__details__widget">
							<div class="row">
								<div class="col-lg-7 col-md-6">
									<ul>
										<li><span>Type:</span> {{$anime->type}}</li>
										<li><span>Studios:</span> {{$anime->studio->name}}</li>
										<li><span>Date aired:</span> Oct 02, 2019 to ?</li>
										<li><span>Status:</span> {{$anime->status}}</li>
										<li><span>Episodes:</span> {{$anime->episodes->count()}}</li>
										<li><span>Genre:</span> 
											@foreach($anime->genres as $genre)
												{{$genre->name}}
												@if(!$loop->last)
													,
												@endif
											@endforeach
										</li>
									</ul>
								</div>
								<div class="col-lg-5 col-md-6">
									<ul>
										<li><span>Source:</span> {{$anime->source->name}}</li>
										<li><span>Ratings:</span> {{round($anime->reviews->avg('rating'), 2)}} / {{$anime->reviews->count()}} reviews</li>
										<li><span>Season:</span> {{$anime->season->name}}</li>
										<li><span>Producers:</span> 
											@foreach($anime->producers as $producer)
												{{$producer->name}}
												@if(!$loop->last)
													,
												@endif
											@endforeach
										</li>
										<li><span>Licensors:</span> 
											@foreach($anime->licensors as $licensor)
												{{$licensor->name}}
												@if(!$loop->last)
													,
												@endif
											@endforeach
										</li>
										<li><span>Studio:</span> {{$anime->studio->name}}</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="anime__details__btn">
							<a href="#" class="follow-btn"><i class="fa fa-heart-o"></i> Follow</a>
						</div>
					</div>
				</div>

				<div class="col-12 mt-4">
					<div class="anime__details__title">
						<h3>Episodes</h3>
					</div>
				</div>

				<div class="col-12">
					<div class="d-flex flex-wrap">
						@foreach($anime->episodes as $episode)
							<div class="anime__details__btn mb-2">
								<a href="{{route('animes.episode', ['slug' => $anime->meta->slug, 'episode' => $episode->slug])}}" class="follow-btn">{{$episode->name}}</a>
							</div>
						@endforeach
					</div>
				</div>

				<div class="col-12 mt-4">
					<div class="anime__details__title">
						<h3>Characters</h3>
					</div>
				</div>

				@foreach($anime->characters as $character)
					<div class="col-6 col-md-3">
						<div class="product__sidebar__comment__item__pic">
							<img src="{{$character->photo}}" alt="" width="100">
						</div>
						<div class="product__sidebar__comment__item__text">
							<h5><a href="#">{{$character->name}}</a></h5>
							<span>{{$character->status}}</span>
						</div>
					</div>
				@endforeach

				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 col-md-8">
					<div class="anime__details__review">
						<div class="section-title">
							<h5>Reviews</h5>
						</div>
						<div class="anime__review__item">
							<div class="anime__review__item__pic">
								<img src="img/anime/review-1.jpg" alt="">
							</div>
							<div class="anime__review__item__text">
								<h6>Chris Curry - <span>1 Hour ago</span></h6>
								<p>whachikan Just noticed that someone categorized this as belonging to the genre
								"demons" LOL</p>
							</div>
						</div>
						<div class="anime__review__item">
							<div class="anime__review__item__pic">
								<img src="img/anime/review-2.jpg" alt="">
							</div>
							<div class="anime__review__item__text">
								<h6>Lewis Mann - <span>5 Hour ago</span></h6>
								<p>Finally it came out ages ago</p>
							</div>
						</div>
						<div class="anime__review__item">
							<div class="anime__review__item__pic">
								<img src="img/anime/review-3.jpg" alt="">
							</div>
							<div class="anime__review__item__text">
								<h6>Louis Tyler - <span>20 Hour ago</span></h6>
								<p>Where is the episode 15 ? Slow update! Tch</p>
							</div>
						</div>
						<div class="anime__review__item">
							<div class="anime__review__item__pic">
								<img src="img/anime/review-4.jpg" alt="">
							</div>
							<div class="anime__review__item__text">
								<h6>Chris Curry - <span>1 Hour ago</span></h6>
								<p>whachikan Just noticed that someone categorized this as belonging to the genre
								"demons" LOL</p>
							</div>
						</div>
						<div class="anime__review__item">
							<div class="anime__review__item__pic">
								<img src="img/anime/review-5.jpg" alt="">
							</div>
							<div class="anime__review__item__text">
								<h6>Lewis Mann - <span>5 Hour ago</span></h6>
								<p>Finally it came out ages ago</p>
							</div>
						</div>
						<div class="anime__review__item">
							<div class="anime__review__item__pic">
								<img src="img/anime/review-6.jpg" alt="">
							</div>
							<div class="anime__review__item__text">
								<h6>Louis Tyler - <span>20 Hour ago</span></h6>
								<p>Where is the episode 15 ? Slow update! Tch</p>
							</div>
						</div>
					</div>
					<div class="anime__details__form">
						<div class="section-title">
							<h5>Your Comment</h5>
						</div>
						<form action="#">
							<textarea placeholder="Your Comment"></textarea>
							<button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
						</form>
					</div>
				</div>
				<div class="col-lg-4 col-md-4">
					<div class="anime__details__sidebar">
						<div class="section-title">
							<h5>you might like...</h5>
						</div>
						<div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-1.jpg">
							<div class="ep">18 / ?</div>
							<div class="view"><i class="fa fa-eye"></i> 9141</div>
							<h5><a href="#">Boruto: Naruto next generations</a></h5>
						</div>
						<div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-2.jpg">
							<div class="ep">18 / ?</div>
							<div class="view"><i class="fa fa-eye"></i> 9141</div>
							<h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
						</div>
						<div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-3.jpg">
							<div class="ep">18 / ?</div>
							<div class="view"><i class="fa fa-eye"></i> 9141</div>
							<h5><a href="#">Sword art online alicization war of underworld</a></h5>
						</div>
						<div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-4.jpg">
							<div class="ep">18 / ?</div>
							<div class="view"><i class="fa fa-eye"></i> 9141</div>
							<h5><a href="#">Fate/stay night: Heaven's Feel I. presage flower</a></h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection