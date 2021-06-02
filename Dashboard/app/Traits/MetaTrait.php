<?php

namespace App\Traits;
use App\Models\Meta;

trait MetaTrait{

	public function addMeta($model, $request){
                $meta = new Meta;
                $meta->meta_title = $request->meta_title;
                $meta->meta_description = $request->meta_description;
                $meta->meta_keyword = $request->meta_keyword;
                $meta->noindex = $request->noindex;
                $meta->canonical = $request->canonical;
                $meta->json_ld = $request->json_ld;
                $meta->slug = $this->generateSlug($request->slug);
                return $model->meta()->save($meta);
	}

        public function updateMeta($model, $request){
                $meta = [
                        'meta_title' => $request->meta_title,
                        'meta_description' => $request->meta_description,
                        'meta_keyword' => $request->meta_keyword,
                        'noindex' => $request->noindex,
                        'canonical' => $request->canonical,
                        'json_ld' => $request->json_ld,
                        'slug' => $this->generateSlug($request->slug),
                ];
                return $model->meta()->update($meta);
        }


}