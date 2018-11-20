<?php

namespace App\Repository;

class DataChecker{

	public function isExist($model, $slug){
		$existing = $model->where('slug','=',$slug)->get();
		if(count($existing) > 0){
			return true;
		}

		$deleted = $model->where('slug','=',$slug)->get();
		if(count($deleted) > 0){
			return true;
		}

		return false;
	}
}
