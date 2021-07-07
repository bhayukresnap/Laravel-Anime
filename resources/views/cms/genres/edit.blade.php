@extends('cms.template.body')

@section('body')

<ol class="breadcrumb">
  <li><a href="index.html">Home</a></li>
  <li class="active">Basic Layout</li>
</ol>


<form id="update" action="{{route('cms.genres.update', $genre->id)}}">
  <div class="page-header">
    <div class="demo-nav-title">
      <div class="media">
        <div class="media-body">
          <div class="display-6">Update Genre - {{$genre->name}}</div>
          <p class="small text-muted">
            Type of Anime
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

            <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{$genre->name}}">
              </div>
            </div>

            <div class="col-xs-12">
              <div class="form-group">
                <label>More description: </label>
                <textarea id="summernote" data-plugin="summernote" name="description">
                  {{$genre->description}}
                </textarea>
              </div>
            </div>

            @include('cms.template.meta', ['meta'=>$genre->meta])

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
  </script>
@endsection