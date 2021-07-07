<?php

namespace App\Traits;
use DB;

Trait ResponseTrait{

	protected function ApiResponse($message, $status = 200, $data = ''){
		return response()->json([
			'data' => $data,
			'message' => is_array($message) ? $message : [$message],
			'status' => $status,
		]);
	}

	protected function SearchResponse($table, $request){
		$data = $request->has('q')
		? DB::table($table)->select('id', 'name')->where('name', 'like', '%'.$request->q.'%')->get()
		: DB::table($table)->select('id', 'name')->get();
        return $this->ApiResponse('Success', 200, $data);
	}

}
