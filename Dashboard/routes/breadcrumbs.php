<?php
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('<i class="fa fa-home"></i> Home', route('home'));
});

//Animes
Breadcrumbs::for('animes', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Animes', route('animes'));
});

Breadcrumbs::for('animes.detail', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('animes');
    $trail->push($data->name, route('animes.detail', ['slug'=> $data->meta->slug]));
});

Breadcrumbs::for('animes.episode', function (BreadcrumbTrail $trail, $episode, $data) {
    $trail->parent('animes.detail', $data);
    $trail->push($episode->name, route('animes.episode', ['slug'=> $data->meta->slug, 'episode' => $episode->slug]));
});


//Genre
Breadcrumbs::for('genres', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Genres', route('genres'));
});

Breadcrumbs::for('genres.detail', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('genres');
    $trail->push($data->name, route('genres.detail', ['slug'=> $data->meta->slug]));
});

