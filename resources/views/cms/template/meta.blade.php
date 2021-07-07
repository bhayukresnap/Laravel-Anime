<div class="col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h6 class="panel-title">Meta</h6>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="form-group col-sm-12">
					<label class="form-form-control-label">No Index</label>
					<input type="checkbox" data-plugin="labelauty" name="noindex" value="false" {{isset($meta->noindex) ? "checked" : ""}} data-labelauty="Active" onchange="$(this).is(':checked') ? $(this).val('true') : $(this).val('false')">
				</div>
				<div class="form-group col-sm-6 col-md-4">
					<label class="form-form-control-label">Slug</label>
					<input class="form-control" type="text" name="slug" placeholder="Slug" autocomplete="off" disabled value="{{isset($meta->slug) ? $meta->slug : ""}}">
					<input class="form-control" type="hidden" name="slug" placeholder="Slug" autocomplete="off" value="{{isset($meta->slug) ? $meta->slug : ""}}">
				</div>
				<div class="form-group col-sm-6 col-md-4">
					<label class="form-form-control-label">Canonical URL</label>
					<input class="form-control" type="text" name="canonical" placeholder="Canonical URL" autocomplete="off" value="{{isset($meta->canonical) ? $meta->canonical : ""}}">
				</div>
				<div class="form-group col-sm-6 col-md-4">
					<label class="form-form-control-label">JSON Structure Data</label>
					<textarea  class="form-control" type="textarea" name="json_ld" placeholder="JSON Structure Data" autocomplete="off">{{isset($meta->json_ld) ? $meta->json_ld : ""}}</textarea>
				</div>
				<div class="form-group col-sm-6 col-md-4">
					<label class="form-form-control-label">Meta Title</label>
					<input class="form-control" type="text" name="meta_title" placeholder="Meta Title" autocomplete="off" value="{{isset($meta->meta_title) ? $meta->meta_title : ""}}">
				</div>
				<div class="form-group col-sm-6 col-md-4">
					<label class="form-form-control-label">Meta Description</label>
					<input class="form-control" type="text" name="meta_description" placeholder="Meta Description" autocomplete="off" value="{{isset($meta->meta_description) ? $meta->meta_description : ""}}">
				</div>
				<div class="form-group col-sm-6 col-md-4">
					<label class="form-form-control-label">Meta Keyword</label>
					<input class="form-control" type="text" name="meta_keyword" placeholder="Meta Keyword" autocomplete="off" value="{{isset($meta->meta_keyword) ? $meta->meta_keyword : ""}}">
				</div>
			</div>
		</div>
	</div>
</div>