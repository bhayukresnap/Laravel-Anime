@extends('main.template.body')

@section('body')
<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="/assets/main/img/hero/hero-1.jpg">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero__text">
                            <div class="label">Adventure</div>
                            <h2>Bhayu ganteng</h2>
                            <p>After 30 days of travel across the world...</p>
                            <a href="#"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__items set-bg" data-setbg="/assets/main/img/hero/hero-1.jpg">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero__text">
                            <div class="label">Adventure</div>
                            <h2>Fate / Stay Night: Unlimited Blade Works</h2>
                            <p>After 30 days of travel across the world...</p>
                            <a href="#"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__items set-bg" data-setbg="/assets/main/img/hero/hero-1.jpg">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero__text">
                            <div class="label">Adventure</div>
                            <h2>Fate / Stay Night: Unlimited Blade Works</h2>
                            <p>After 30 days of travel across the world...</p>
                            <a href="#"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="trending__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Recently Added Shows</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($recently as $episode)
                            <div class="col-lg-3 col-md-6 col-6">
                                <div class="product__item">
                                    <a href="{{route('animes.episode', ['slug' => $episode->anime->meta->slug, 'episode' => $episode->slug])}}">
                                        <div class="product__item__pic set-bg" data-setbg="{{$episode->anime->photo}}">
                                            <div class="comment"><i class="fa fa-comments"></i> {{$episode->anime->reviews->count()}}</div>
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                <li>Active</li>
                                                <li>Movie</li>
                                            </ul>
                                            <h5><a href="#">{{$episode->anime->name}} - {{$episode->name}}</a></h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{$recently->appends(request()->input())->onEachSide(3)->links('vendor.pagination.anime') }}
                </div>
            </div>
        </div>
    </section>
    @endsection