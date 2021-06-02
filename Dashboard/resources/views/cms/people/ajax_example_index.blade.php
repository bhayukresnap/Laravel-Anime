@extends('cms.template.body')

@section('body')
<ol class="breadcrumb">
  <li><a href="index.html">Home</a></li>
  <li class="active">Basic Layout</li>
</ol>

<div class="page-header">
  <div class="demo-nav-title">
    <div class="media">
      <div class="media-body">
        <div class="display-6">People</div>
        <p class="small text-muted">
          Voice Actors, Staff, and etc
        </p>
      </div>
    </div>
    <div class="pull-xs-right" role="toolbar">
      <a href="{{route('cms.people.create')}}" class="btn btn-success" type="button">Add Data</a>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="panel-wrapper">
    <div class="panel">
      <div class="table-bar">
        <div class="form-inline">

          <form class="input-group" id="search" action="{{route('cms.people.page')}}">
            <input class="form-control" type="text" placeholder="Search by Name or Slug" name="search" aria-describedby="basic-addon2" autocomplete="off">
            <span id="basic-addon2" class="input-group-addon" >
              <i class="icon ion-search"></i>
            </span>
          </form>

          <div class="form-group pull-md-right">
            <label class="form-control-label">Filter: </label>
            <select class="form-control c-select form-control-sm">
              <option>Edinburgh</option>
              <option>Tokyo</option>
              <option>San Francisco</option>
            </select>
          </div>

        </div>
      </div>
      <div class="responsive-nav">
        <table class="table">
          <thead class="thead-inverse">
            <tr>
              <th>Name</th>
              <th>Slug</th>
              <th>Given Name</th>
              <th>Family Name</th>
              <th>Birthday</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($people as $person)
              <tr>
                <td>{{$person->name}}</td>
                <td>{{$person->slug}}</td>
                <td>{{$person->given_name}}</td>
                <td>{{$person->family_name}}</td>
                <td>{{$person->birthday}}</td>
                <td>
                  <a class="btn btn-primary" href="{{route('cms.people.edit', $person->id)}}">
                    <i class="icon ion-edit"></i>
                  </a>
                  <a class="btn btn-danger" onclick="removeData('{{route('cms.people.destroy', $person->id)}}')">
                    <i class="icon ion-close"></i>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="table-bar">
        {{ $people->appends(request()->input())->onEachSide(1)->links('vendor.pagination.bootstrap-4') }}
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
  <script type="text/javascript">
    let search = '';
    const search_param = search ? ('&search='+search) : '';

    const fetchPeople = (data) => {
      let str = '';
      data.data.map((person)=> {
        str +=  '<tr>'
        str +=    '<td>'+person.name+'</td>'
        str +=    '<td>'+person.slug+'</td>'
        str +=    '<td>'+person.given_name+'</td>'
        str +=    '<td>'+person.family_name+'</td>'
        str +=    '<td>'+person.birthday+'</td>'
        str +=    '<td>'
        str +=      '<a class="btn btn-primary" href="/cms/people/'+person.id+'/edit">'
        str +=        '<i class="icon ion-edit"></i>'
        str +=      '</a>'
        str +=      ' '
        str +=      '<a class="btn btn-danger" onclick="removeData(\'/cms/people/'+person.id+'\')">'
        str +=        '<i class="icon ion-close"></i>'
        str +=      '</a>'
        str +=    '</td>'
        str +=  '</tr>'
      });
      $('table tbody').html(str);

      fetchPagination(data.current_page, data.last_page)
    }

    $('form#search').submit(function(e){
      e.preventDefault();
      search = $(this).context[0]['value'];
        $loading.attr('style', 'display:block;')
        $.get($(this).attr('action'), {search: $(this).context[0]['value']})
        .done(function(data){
          fetchPeople(data)
        })
        .fail(function() {
          console.log( "error" );
        })
        .always(function(data){
          $loading.attr('style', 'display:none;')
        });
    });

    $('body').delegate('.pagination a', 'click', function(e){
      e.preventDefault();
      $loading.attr('style', 'display:block;')
      $.get(window.location.href.split('?')[0]+'/page?page='+$.urlParam($(this).attr('href'), 'page')+search_param, function(data){
        fetchPeople(data)
      })
      .fail(function() {
        alert( "error" );
      })
      .always(function(data){
        $loading.attr('style', 'display:none;')
      });
    });


    function removeData(url){
      $loading.attr('style', 'display:block;');
      $.ajax({
        async:true,
        url: url,
        type: 'DELETE',
        error: function(error){
          notify(error.responseJSON.message, error.status);
          notify(error.statusText, error.status);
        },
        success: function(success){
          success.message.map( data => notify(data, success.status) );
          $.get(window.location.href.split('?')[0]+'/page?page='+$('.pagination li.active .page-link').html(), function(data){
            fetchPeople(data)
          })
          .fail(function() {
            alert( "error" );
          })
          .always(function(data){
            $loading.attr('style', 'display:none;')
          });
        },
      }).always(function(data){
        $loading.attr('style', 'display:none;');
      });
    };
  </script>
@endsection

