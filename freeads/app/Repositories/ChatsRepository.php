<?php

namespace App\Repositories;

use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class ChatsRepository
{

    protected $chats;

    public function __construct(Message $chats)
	{
		$this->chats = $chats;
	}

	private function save(Chats $Chats, Array $inputs)
	{
		/*$ads->titre = $inputs['titre'];
		$ads->description = $inputs['description'];
		$ads->price = $inputs['price'];	
		$tmp_name = $_FILES['pics']['tmp_name'];
		$name = $_FILES['pics']['name'];
	 	$ads->pics = "/storage/".$name;
		move_uploaded_file($tmp_name, $_SERVER['DOCUMENT_ROOT']."/storage/".$name);
		$ads->id_user = Auth::id();*/
		$ads->save();
	}

	public function getPaginate($n)
	{
		return $this->chats->paginate($n);
	}

	public function store(Array $inputs)
	{
		$Chats = new $this->chats;

		$this->save($Chats, $inputs);

		return $Chats;
	}

	public function getById($id)
	{
		return $this->chats->findOrFail($id);
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