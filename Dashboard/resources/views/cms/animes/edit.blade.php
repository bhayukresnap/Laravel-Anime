@extends('cms.template.body')

@section('body')

<ol class="breadcrumb">
  <li><a href="index.html">Home</a></li>
  <li class="active">Basic Layout</li>
</ol>


<form id="update" action="{{route('cms.animes.update', $anime->id)}}">
  <div class="page-header">
    <div class="demo-nav-title">
      <div class="media">
        <div class="media-body">
          <div class="display-6">Update Anime - {{$anime->name}}</div>
          <p class="small text-muted">
            Characters in Anime, Manga, Light Novel
          </p>
        </div>
      </div>
      <div class="pull-xs-right" role="toolbar">
        <button class="btn btn-success" type="submit">Save Data</button>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="panel-wrapper">
      <div class="panel">
        <div class="panel-body">
          <div class="row">

            <div class="col-xs-12 col-md-4 h-100">
              <div class="row">
                <div class="col-xs-12">
                  <div class="form-group text-center" id="lfm" data-input="photo" data-preview="holder" data-thumb="photo_thumb">
                    <label>Photo</label>
                    <div id="holder">
                      <img src="{{$anime->photo}}" class="img-fluid">
                    </div>
                    <div class="input-group">
                      <span class="input-group-btn">
                        <a class="btn btn-primary">
                          <i class="fa fa-picture-o"></i> Choose
                        </a>
                      </span>
                      <input id="photo" class="form-control" type="text" name="photo" readonly value="{{$anime->photo}}">
                      <input id="photo_thumb" type="hidden" name="thumbnail" value="{{$anime->thumbnail}}">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="row">
                <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{$anime->name}}">
              </div>
            </div>

            <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>English</label>
                <input type="text" name="english" class="form-control" value="{{$anime->english}}">
              </div>
            </div>

            <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>Synonyms</label>
                <input type="text" name="synonyms" class="form-control" value="{{$anime->synonyms}}">
              </div>
            </div>

            <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>Japanese</label>
                <input type="text" name="japanese" class="form-control" value="{{$anime->japanese}}">
              </div>
            </div>

            <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" data-plugin="select2">
                  @if($anime->status)
                    <option value="{{$anime->status}}" selected>{{$anime->status}}</option>
                  @endif
                  <option value="Airing">Airing</option>
                  <option value="On-going">On-going</option>
                </select>
              </div>
            </div>

            <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>Type</label>
                <select class="form-control" name="type" data-plugin="select2">
                  @if($anime->type)
                    <option value="{{$anime->type}}" selected>{{$anime->type}}</option>
                  @endif
                  <option value="TV">TV</option>
                  <option value="Movie">Movie</option>
                  <option class="OVA">OVA</option>
                </select>
              </div>
            </div>

            <div class="col-xs-12 col-md-6">
              <label>Aired from</label>
              <div class="input-group date">
                <input type="text" class="form-control datepicker" name="aired_from" value="{{\Carbon\Carbon::parse($anime->aired_from)->format('m/d/Y')}}" data-plugin="daterangepicker">
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-th"></span>
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-md-6">
              <label>Aired to</label>
              <div class="input-group date ">
                <input type="text" class="form-control datepicker" name="aired_to" value="{{\Carbon\Carbon::parse($anime->aired_to)->format('m/d/Y')}}" data-plugin="daterangepicker">
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-th"></span>
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>Studio</label>
                <select class="form-control" id="studio" name="studio">
                  @if($anime->studio)
                    <option value="{{$anime->studio->id}}" selected>{{$anime->studio->name}}</option>
                  @endif
                </select>
              </div>
            </div>

            <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>Source</label>
                <select class="form-control" id="source" name="source">
                  @if($anime->source)
                    <option value="{{$anime->source->id}}" selected>{{$anime->source->name}}</option>
                  @endif
                </select>
              </div>
            </div>

            <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>Season</label>
                <select class="form-control" id="season" name="season">
                  @if($anime->season)
                    <option value="{{$anime->season->id}}" selected>{{$anime->season->name}}</option>
                  @endif
                </select>
              </div>
            </div>

            <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>Genre</label>
                <select class="form-control" id="genre" name="genres[]" multiple data-placeholder="Multiple Select Available">
                  @foreach($anime->genres as $genre)
                    <option value="{{$genre->id}}" selected>{{$genre->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>Producer</label>
                <select class="form-control" id="producer" name="producers[]" multiple data-placeholder="Multiple Select Available">
                  @foreach($anime->producers as $producer)
                    <option value="{{$producer->id}}" selected>{{$producer->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>Licensor</label>
                <select class="form-control" id="licensor" name="licensors[]" multiple data-placeholder="Multiple Select Available">
                  @foreach($anime->licensors as $licensor)
                    <option value="{{$licensor->id}}" selected>{{$licensor->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>


            <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>Staff</label>
                <select class="form-control" id="person" name="staffs[]" multiple data-placeholder="Multiple Select Available">
                  @foreach($anime->staffs as $staff)
                    <option value="{{$staff->id}}" selected>{{$staff->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>Character</label>
                <select class="form-control" id="character" name="characters[]" multiple data-placeholder="Multiple Select Available">
                  @foreach($anime->characters as $character)
                    <option value="{{$character->id}}" selected>{{$character->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
              </div>
            </div>


            <div class="col-xs-12">
              <div class="form-group">
                <label>More description: </label>
                <textarea id="summernote" data-plugin="summernote" name="description">
                  {{$anime->description}}
                </textarea>
              </div>
            </div>

            @include('cms.template.meta', ['meta' => $anime->meta])

          </div>
        </div>
      </div>
    </div>
  </div>
</form>

@endsection

@section('script')
  <script type="text/javascript">
    setImage('lfm', 'image');
    ajaxData('#studio', '{{route("cms.search.studio")}}');
    ajaxData('#source', '{{route("cms.search.source")}}');
    ajaxData('#season', '{{route("cms.search.season")}}');
    ajaxData('#genre', '{{route("cms.search.genre")}}');
    ajaxData('#producer', '{{route("cms.search.producer")}}');
    ajaxData('#person', '{{route("cms.search.person")}}');
    ajaxData('#licensor', '{{route("cms.search.licensor")}}');
    ajaxData('#character', '{{route("cms.search.character")}}');
  </script>
@endsection