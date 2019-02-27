<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdsUpdateRequest extends Request
{

    public function authorize()
	{
		return true;
	}

	public function rules()
	{
		$id = $this->segment(2);
		return [
			'description' => 'required|max:255|unique:ads,description,' . $id,
			'price' => 'required|max:255|unique:ads,price,' . $id
		];
	}

}