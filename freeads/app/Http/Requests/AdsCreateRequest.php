<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdsCreateRequest extends Request
{

    public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'titre' => 'required|max:255',
			'description' => 'required|max:255',
			'price' => 'required|email|max:255',
			'pics' => 'required|confirmed|min:6'
		];
	}

}