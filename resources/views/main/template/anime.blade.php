<div class="col-lg-3 col-md-6 col-6">
	<div class="product__item">
		<a href="{{route('animes.detail', ['slug' => $anime->meta->slug])}}">
			<div class="product__item__pic set-bg" data-setbg="{{$anime->photo}}">
				{{-- <div class="ep">18 / 18</div> --}}
				<div class="comment"><i class="fa fa-comments"></i> {{$anime->reviews->count()}}</div>
				{{-- <div class="view"><i class="fa fa-eye"></i> 9141</div> --}}
			</div>
			<div class="product__item__text">
				<ul>
					<li>Active</li>
					<li>Movie</li>
				</ul>
				<h5><a href="#">{{$anime->name}}</a></h5>
			</div>
		</a>
	</div>
</div>