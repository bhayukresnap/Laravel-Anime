@extends('cms.template.body')

@section('body')

<ol class="breadcrumb">
  <li><a href="index.html">Home</a></li>
  <li class="active">Basic Layout</li>
</ol>


<form id="add" action="{{route('cms.animes.store')}}">
  <div class="page-header">
    <div class="demo-nav-title">
      <div class="media">
        <div class="media-body">
          <div class="display-6">Create Anime</div>
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
                    <div id="holder" class="image_placeholder"></div>
                    <div class="input-group">
                      <span class="input-group-btn">
                        <a class="btn btn-primary">
                          <i class="fa fa-picture-o"></i> Choose
                        </a>
                      </span>
                      <input id="photo" class="form-control" type="text" name="photo" readonly>
                      <input id="photo_thumb" type="hidden" name="thumbnail">
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
                <input type="text" name="name" class="form-control">
              </div>
            </div>

            <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>English</label>
                <input type="text" name="english" class="form-control">
              </div>
            </div>

            <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>Synonyms</label>
                <input type="text" name="sysnonyms" class="form-control">
              </div>
            </div>

            <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>Japanese</label>
                <input type="text" name="japanese" class="form-control">
              </div>
            </div>

            <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" data-plugin="select2">
                  <option disabled selected>----</option>
                  <option value="Airing">Airing</option>
                  <option value="On-going">On-going</option>
                </select>
              </div>
            </div>

            <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>Type</label>
                <select class="form-control" name="type" data-plugin="select2">
                  <option disabled selected>----</option>
                  <option value="TV">TV</option>
                  <option value="Movie">Movie</option>
                  <option class="OVA">OVA</option>
                </select>
              </div>
            </div>

            <div class="col-xs-12 col-md-6">
              <label>Aired from</label>
              <div class="input-group date">
                <input type="text" class="form-control datepicker" name="aired_from" value="" data-plugin="daterangepicker">
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-th"></span>
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-md-6">
              <label>Aired to</label>
              <div class="input-group date ">
                <input type="text" class="form-control datepicker" name="aired_to" value="" data-plugin="daterangepicker">
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-th"></span>
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>Studio</label>
                <select class="form-control" id="studio" name="studio">
                  
                </select>
              </div>
            </div>

            <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>Source</label>
                <select class="form-control" id="source" name="source">
                  
                </select>
              </div>
            </div>

            <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>Season</label>
                <select class="form-control" id="season" name="season">
                  
                </select>
              </div>
            </div>

            <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>Genre</label>
                <select class="form-control" id="genre" name="genres[]" multiple data-placeholder="Multiple Select Available">
                  <option></option>
                </select>
              </div>
            </div>

            <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>Producer</label>
                <select class="form-control" id="producer" name="producers[]" multiple data-placeholder="Multiple Select Available">
                  
                </select>
              </div>
            </div>

            <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>Licensor</label>
                <select class="form-control" id="licensor" name="licensors[]" multiple data-placeholder="Multiple Select Available">
                  
                </select>
              </div>
            </div>


            <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>Staff</label>
                <select class="form-control" id="person" name="staffs[]" multiple data-placeholder="Multiple Select Available">
                  
                </select>
              </div>
            </div>

            <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>Character</label>
                <select class="form-control" id="character" name="characters[]" multiple data-placeholder="Multiple Select Available">
                  
                </select>
              </div>
            </div>
              </div>
            </div>


            <div class="col-xs-12">
              <div class="form-group">
                <label>More description: </label>
                <textarea id="summernote" data-plugin="summernote" name="description"></textarea>
              </div>
            </div>

            @include('cms.template.meta')

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