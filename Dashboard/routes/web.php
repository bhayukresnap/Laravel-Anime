<?php

use Illuminate\Support\Facades\Route;
use App\Traits\VideoTrait;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('cms/gallery')->group(function(){
	\UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::prefix('cms')->name('cms.')->group(function(){
	Route::get('login', [App\Http\Controllers\cms\Auth\LoginController::class, 'view'])->name('login');
	Route::post('login', [App\Http\Controllers\cms\Auth\LoginController::class, 'authenticate'])->name('login.post');
	Route::get('logout', [App\Http\Controllers\cms\Auth\LoginController::class, 'logout'])->name('logout');


	Route::middleware(['auth', 'IsAdmin'])->group(function(){
		Route::get('/', function(){return view('cms.index');})->name('home');
		Route::resource('animes', \App\Http\Controllers\cms\AnimeController::class);
		Route::resource('characters', \App\Http\Controllers\cms\CharacterController::class);
		Route::resource('episodes', \App\Http\Controllers\cms\EpisodeController::class);
		Route::resource('people', \App\Http\Controllers\cms\PersonController::class);
		Route::resource('licensors', \App\Http\Controllers\cms\LicensorController::class);
		Route::resource('sources', \App\Http\Controllers\cms\SourceController::class);
		Route::resource('studios', \App\Http\Controllers\cms\StudioController::class);
		Route::resource('seasons', \App\Http\Controllers\cms\SeasonController::class);
		Route::resource('producers', \App\Http\Controllers\cms\ProducerController::class);
		Route::resource('genres', \App\Http\Controllers\cms\GenreController::class);
		Route::prefix('search')->name('search.')->group(function(){
			Route::get('person', [\App\Http\Controllers\cms\SearchController::class, 'getPerson'])->name('person');
			Route::get('studio', [\App\Http\Controllers\cms\SearchController::class, 'getStudio'])->name('studio');
			Route::get('producer', [\App\Http\Controllers\cms\SearchController::class, 'getProducer'])->name('producer');
			Route::get('season', [\App\Http\Controllers\cms\SearchController::class, 'getSeason'])->name('season');
			Route::get('source', [\App\Http\Controllers\cms\SearchController::class, 'getSource'])->name('source');
			Route::get('licensor', [\App\Http\Controllers\cms\SearchController::class, 'getLicensor'])->name('licensor');
			Route::get('genre', [\App\Http\Controllers\cms\SearchController::class, 'getGenre'])->name('genre');
			Route::get('character', [\App\Http\Controllers\cms\SearchController::class, 'getCharacter'])->name('character');
			Route::get('anime', [\App\Http\Controllers\cms\SearchController::class, 'getAnime'])->name('anime');
		});
	});

});