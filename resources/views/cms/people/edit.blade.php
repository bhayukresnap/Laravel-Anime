@extends('cms.template.body')

@section('body')

<ol class="breadcrumb">
  <li><a href="index.html">Home</a></li>
  <li class="active">Basic Layout</li>
</ol>

<form id="update" action="{{route('cms.people.update', $person->id)}}">
  <div class="page-header">
    <div class="demo-nav-title">
      <div class="media">
        <div class="media-body">
          <div class="display-6">Edit People - {{$person->name}}</div>
          <p class="small text-muted">
            Voice Actors, Staff, and etc
          </p>
        </div>
      </div>
      <div class="pull-xs-right" role="toolbar">
        <button class="btn btn-success" type="submit">Update Data</button>
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
                      <img src="{{$person->photo}}" class="img-fluid">
                    </div>
                    <div class="input-group">
                      <span class="input-group-btn">
                        <a class="btn btn-primary">
                          <i class="fa fa-picture-o"></i> Choose
                        </a>
                      </span>
                      <input id="photo" class="form-control" type="text" name="photo" readonly value="{{$person->photo}}">
                      <input id="photo_thumb" type="hidden" name="thumbnail" value="{{$person->thumbnail}}">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-md-4">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{$person->name}}">
              </div>
            </div>

            <div class="col-xs-12 col-md-4">
              <div class="form-group">
                <label>Given Name</label>
                <input type="text" name="given_name" class="form-control" value="{{$person->given_name}}">
              </div>
            </div>

            <div class="col-xs-12 col-md-4">
              <div class="form-group">
                <label>Family Name</label>
                <input type="text" name="family_name" class="form-control" value="{{$person->family_name}}">
              </div>
            </div>

            <div class="col-xs-12 col-md-4">
              <label>Birthday</label>
              <div class="input-group date">
                <input type="text" class="form-control datepicker" id="daterangepicker" name="birthday" value="{{\Carbon\Carbon::parse($person->birthday)->format('m/d/Y')}}">
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-th"></span>
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-md-8">
              <div class="form-group">
                <label>Website</label>
                <input type="text" name="website" class="form-control" value="{{$person->website}}">
              </div>
            </div>

            <div class="col-xs-12 col-md-8">
              <div class="form-group">
                <label>More description: </label>
                <textarea id="summernote" data-plugin="summernote" name="description">
                  {{$person->description}}
                </textarea>
              </div>
            </div>

            @include('cms.template.meta', ['meta' => $person->meta])

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