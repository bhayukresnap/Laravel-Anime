$loading = $('#preloading');

$.ajaxSetup({
	headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
});

function notify(message, status){

	$.notify(status+': '+message, {
      	position: 'top right',
      	hideDuration: '10',
      	showAnimation: 'fadeIn',
      	hideAnimation: 'fadeOut',
      	className: status === 200 ? 'success' : 'danger',
    });
}

var setImage = function(id, type, options) {
	let button = document.getElementById(id);

	button.addEventListener('click', function () {
		var route_prefix = (options && options.prefix) ? options.prefix : '/cms/gallery';
		var target_input = document.getElementById(button.getAttribute('data-input'));
		var target_thumb = document.getElementById(button.getAttribute('data-thumb'));
		var target_preview = document.getElementById(button.getAttribute('data-preview'));

		window.open(route_prefix + '?type=' + type || 'file', 'FileManager', 'width=900,height=600');
		window.SetUrl = function (items) {
			var file_path = items.map(function (item) {
				return item.url;
			}).join(',');

			target_input.value = file_path;
			target_input.dispatchEvent(new Event('change'));
			target_preview.innerHtml = '';

			items.forEach(function (item) {
				$(target_preview).removeAttr('class').html('<img class="img-fluid" src="'+item.url+'">')
				$(target_thumb).attr('value', item.thumb_url)
			});

		};
	});
};

var setVideo = function(id, type, options) {
	let button = document.getElementById(id);

	button.addEventListener('click', function () {
		var route_prefix = (options && options.prefix) ? options.prefix : '/cms/gallery';
		var target_input = document.getElementById(button.getAttribute('data-input'));
		var target_preview = document.getElementById(button.getAttribute('data-preview'));

		window.open(route_prefix + '?type=' + type || 'file', 'FileManager', 'width=900,height=600');
		window.SetUrl = function (items) {
			var file_path = items.map(function (item) {
				return item.url;
			}).join(',');

			target_input.value = file_path;
			target_input.dispatchEvent(new Event('change'));
			target_preview.innerHtml = '';
			items.forEach(function (item) {
				let str = '';
				str +=	'<div class="embed-responsive embed-responsive-16by9">'
        str +=		'<video controls src="'+item.url+'">'
        str +=		'</video>'
				str +=	'<div>'
				$(target_preview).removeAttr('class').html(str);
			});

		};
	});
};


$('form#login').submit(function(e){
	e.preventDefault();
	$loading.attr('style', 'display:block;');
	$.ajax({
		async:true,
		url: $(this).attr('action'),
		type: 'post',
		data: new FormData(this),
		dataType:'JSON',
		contentType: false,
		cache: false,
		processData: false,
		error: function(error){
			notify(error.responseJSON.message, error.status);
			notify(error.statusText, error.status);
		},
		success: function(success){
			success.status == 200 ? window.location.href = '/cms/login' : success.message.map( data => notify(data, success.status) );
		},
	})
	.always(function(data){
		$loading.attr('style', 'display:none;');
	})
});

$('form#add').submit(function(e){
	e.preventDefault();
	$loading.attr('style', 'display:block;');
	$.ajax({
		async:true,
		url: $(this).attr('action'),
		type: 'post',
		data: new FormData(this),
		dataType:'JSON',
		contentType: false,
		cache: false,
		processData: false,
		error: function(error){
			notify(error.responseJSON.message, error.status);
			notify(error.statusText, error.status);
		},
		success: function(success){
			success.message.map( data => notify(data, success.status) );
			if(success.status == 200){
				$('input, #summernote').val('');
				$('#holder').addClass('image_placeholder').html('');
				$('select') ? $('select').select2('val', '') : null;
			}
		},
	})
	.always(function(data){
		$loading.attr('style', 'display:none;');
	})
});

$('form#update').submit(function(e){
	e.preventDefault();
	$loading.attr('style', 'display:block;');
	const formData = new FormData(this);
	formData.append('_method', 'PUT');
	$.ajax({
		async:true,
		url: $(this).attr('action'),
		type: 'POST',
		data: formData,
		dataType:'JSON',
		contentType: false,
		cache: false,
		processData: false,
		error: function(error){
			notify(error.responseJSON.message, error.status);
			notify(error.statusText, error.status);
		},
		success: function(success){
			success.message.map( data => notify(data, success.status) );
		},
	}).always(function(data){
		$loading.attr('style', 'display:none;');
	});
});


function ajaxData(target, url){
	$(target).select2({
		ajax: {
			url: url,
			processResults: function (data) {
				return data.data ? {
					results: data.data.map(function(obj){
						return {id: obj.id, text: obj.name};
					}),
				} : "";
			},
			cache: true,
		},
	});
}

$('input[name="name"], input[name="slug"]').keyup(function(){
  $('input[name="slug"]').val(convertToSlug($(this).val()))
});

function convertToSlug(Text){
    return Text.toLowerCase().replace(/ /g,'-').replace(/[-]+/g, '-').replace(/[^\w-]+/g,'');
}

function pagination(currentPage, nrOfPages) {
	var delta = 2,
	range = [],
	rangeWithDots = [],
	l;

	range.push(1);  

	if (nrOfPages <= 1){
		return range;
	}

	for (let i = currentPage - delta; i <= currentPage + delta; i++) {
		if (i < nrOfPages && i > 1) {
			range.push(i);
		}
	}  
	range.push(nrOfPages);

	for (let i of range) {
		if (l) {
			if (i - l === 2) {
				rangeWithDots.push(l + 1);
			} else if (i - l !== 1) {
				rangeWithDots.push('...');
			}
		}
		rangeWithDots.push(i);
		l = i;
	}

	return rangeWithDots;
}

const fetchPagination = (current_page, last_page) => {
	str = '';
      if(current_page == 1){
        str +=  '<li class="page-item disabled" aria-disabled="true" aria-label="« Previous">'
        str +=    '<span class="page-link" aria-hidden="true">‹</span>'
        str +=  '</li>'
      }else{
        str +=  '<li class="page-item">'
        str +=    '<a class="page-link" href="'+window.location.href.split('?')[0]+'?page='+(current_page - 1)+'" rel="next" aria-label="« Previous">‹</a>'
        str +=  '</li>'
      }
      
      for(let i of pagination(current_page, last_page)){
        if(Number.isInteger(i)){
          str +=  '<li class="page-item '+(i == current_page ? 'active' : null)+'"><a class="page-link" href="'+window.location.href.split('?')[0]+'?page='+i+'">'+i+'</a></li>'
        }else{
          str +=  '<li class="page-item disabled" aria-disabled="true" aria-label="...">'
          str +=    '<span class="page-link" aria-hidden="true">...</span>'
          str +=  '</li>'
        }
      }

      if(current_page == last_page){
        str +=  '<li class="page-item disabled" aria-disabled="true" aria-label="Next »">'
        str +=    '<span class="page-link" aria-hidden="true">›</span>'
        str +=  '</li>'
      }else{
        str +=  '<li class="page-item">'
        str +=    '<a class="page-link" href="'+window.location.href.split('?')[0]+'?page='+(current_page + 1)+'" rel="next" aria-label="Next »">›</a>'
        str +=  '</li>'
      }

      $('.pagination').html(str);
}

$.urlParam = function(url, name){
  var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(url);
  return results[1] || 0;
}