@extends('cms.template.body')

@section('body')

<ol class="breadcrumb">
  <li><a href="index.html">Home</a></li>
  <li class="active">Basic Layout</li>
</ol>


<form id="update" action="{{route('cms.characters.update', $character->id)}}">
  <div class="page-header">
    <div class="demo-nav-title">
      <div class="media">
        <div class="media-body">
          <div class="display-6">Edit Character - {{$character->name}}</div>
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
                      <img src="{{$character->photo}}" class="img-fluid">
                    </div>
                    <div class="input-group">
                      <span class="input-group-btn">
                        <a class="btn btn-primary">
                          <i class="fa fa-picture-o"></i> Choose
                        </a>
                      </span>
                      <input id="photo" class="form-control" type="text" name="photo" readonly value={{$character->photo}}>
                      <input id="photo_thumb" type="hidden" name="thumbnail" value="{{$character->thumbnail}}">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-md-4">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{$character->name}}">
              </div>
            </div>

            <div class="col-xs-12 col-md-4">
              <div class="form-group">
                <label>Slug</label>
                <input type="text" name="slug" class="form-control" value="{{$character->slug}}">
              </div>
            </div>

            <div class="col-xs-12 col-md-4">
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" data-plugin="select2">
                  <option disabled selected>----</option>
                  <option value="Main">Main</option>
                  <option value="Support">Support</option>
                </select>
              </div>
            </div>

            <div class="col-xs-12 col-md-4">
              <label>Birthday</label>
              <div class="input-group date">
                <input type="text" class="form-control datepicker" id="daterangepicker" name="birthday" value="{{\Carbon\Carbon::parse($character->birthday)->format('m/d/Y')}}">
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-th"></span>
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-md-4">
              <div class="form-group">
                <label>Voice Actor</label>
                <select class="form-control" id="voice_actors" name="voice_actor">
                  @if($voice_actor)
                    <option value="{{$voice_actor->id}}">{{$voice_actor->name}}</option>
                  @endif
                </select>
              </div>
            </div>

            <div class="col-xs-12 col-md-8">
              <div class="form-group">
                <label>More description: </label>
                <textarea id="summernote" data-plugin="summernote" name="description">
                  {{$character->description}}
                </textarea>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</form>

@endsection

@section('script')
  <script type="text/javascript">
    $('select[name="status"] option[value="'{{$character->status}}'"]').prop('selected', true);
    setImage('lfm', 'image');
    $('#voice_actors').select2({
      ajax: {
        url: '{{route('cms.search.person')}}',
        processResults: function (data) {
          // Transforms the top-level key of the response object from 'items' to 'results'
          return data.data ? {
            results: data.data.map(function(obj){
              return {id: obj.id, text: obj.name};
            }),
          } : "";
        },
        cache: true,
      }
    });
  </script>
@endsection