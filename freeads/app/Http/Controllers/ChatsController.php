<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ChatsRepository;
use App\Controller\UserController;
class ChatsController extends Controller
{
	protected $adsRepository;

    protected $nbrPerPage = 4;

	public function __construct(ChatsRepository $ChatsRepository)
	{
      $this->ChatsRepository = $ChatsRepository;
	  $this->middleware('auth');
	}

	/**
	 * Show chats
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
    {
    	var_dump($id);
        $chats = $this->ChatsRepository->getById($id);
        return view('chatsshow',  compact('chats'));
    }
	public function index()
	{
	   	$messages = $this->ChatsRepository->getPaginate($this->nbrPerPage);
        $links = $messages->setPath('')->render();
        return view('chat', compact('messages', 'links'));
	}
	public function sendMessage(Request $request)
	{
    //
	}
}