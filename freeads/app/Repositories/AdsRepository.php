<?php

namespace App\Repositories;

use App\ads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class AdsRepository
{

    protected $ads;

    public function __construct(Ads $ads)
	{
		$this->ads = $ads;
	}

	private function save(Ads $ads, Array $inputs)
	{
		$ads->titre = $inputs['titre'];
		$ads->description = $inputs['description'];
		$ads->price = $inputs['price'];
		$tmp_name = $_FILES['pics']['tmp_name'];
		$name = $_FILES['pics']['name'];
	 	$ads->pics = "/storage/".$name;
		move_uploaded_file($tmp_name, $_SERVER['DOCUMENT_ROOT']."/storage/".$name);
		$ads->id_user = Auth::id();
		$ads->save();
	}

	public function getPaginate($n)
	{
		return $this->ads->paginate($n);
	}

	public function store(Array $inputs)
	{
		$ads = new $this->ads;

		$this->save($ads, $inputs);

		return $ads;
	}

	public function getById($id)
	{
		return $this->ads->findOrFail($id);
	}

	public function update($id, Array $inputs)
	{
		$this->save($this->getById($id), $inputs);
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

}