<?php

namespace App\Http\Requests;

class Request 
{
	public function all()
	{
		return $_POST;
	}
	public function input()
	{
		return $_POST['name'];
	}
}