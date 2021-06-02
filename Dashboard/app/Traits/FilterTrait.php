<?php

namespace App\Traits;
trait FilterTrait{

	public function filter($model, $request, $whereHas = 'meta'){

		$model = $model::with($whereHas);

        if(isset($request->search) && !empty($request->search)){
            $model->where('name', 'LIKE', '%'.$request->search.'%')->orWhereHas($whereHas, function($q) use ($request){
            	return $q->where('slug', 'LIKE', '%'.$request->search.'%')->orWhere('name', 'LIKE', '%'.$request->search.'%');
            });
            
        }

        if(isset($request->filter) && !empty($request->filter)){
            Switch($request->filter){
                case 1: 
                    $model->orderBy('name'); break;
                case 2:
                    $model->orderBy('name', 'desc'); break;
                case 3: 
                    $model->orderBy('created_at'); break;
                case 4:
                    $model->orderBy('created_at', 'desc'); break;
                default:
                    $model->orderBy('title'); break;
            }
        }

		return $model->paginate($this->paginate);
	}

}