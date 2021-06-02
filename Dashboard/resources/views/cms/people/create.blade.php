@extends('cms.template.body')

@section('body')

<ol class="breadcrumb">
  <li><a href="index.html">Home</a></li>
  <li class="active">Basic Layout</li>
</ol>


<form id="add" action="{{route('cms.people.store')}}">
  <div class="page-header">
    <div class="demo-nav-title">
      <div class="media">
        <div class="media-body">
          <div class="display-6">Create People</div>
          <p class="small text-muted">
            Voice Actors, Staff, and etc
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

            <div class="col-xs-12 col-md-4">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
              </div>
            </div>

            <div class="col-xs-12 col-md-4">
              <div class="form-group">
                <label>Given Name</label>
                <input type="text" name="given_name" class="form-control">
              </div>
            </div>

            <div class="col-xs-12 col-md-4">
              <div class="form-group">
                <label>Family Name</label>
                <input type="text" name="family_name" class="form-control">
              </div>
            </div>

            <div class="col-xs-12 col-md-4">
              <label>Birthday</label>
              <div class="input-group date">
                <input type="text" class="form-control datepicker" data-plugin="daterangepicker" name="birthday" value="">
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-th"></span>
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-md-8">
              <div class="form-group">
                <label>Website</label>
                <input type="text" name="website" class="form-control">
              </div>
            </div>

            <div class="col-xs-12 col-md-8">
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
  </script>
@endsection