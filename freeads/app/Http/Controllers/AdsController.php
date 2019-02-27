<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\AdsRepository;
use App\Http\Requests\AdsUpdateRequest;
use App\Http\Requests\AdsCreateRequest;
use Illuminate\Database\Eloquent\Collection;
use App\ads;
class AdsController extends Controller
{
	protected $adsRepository;

    protected $nbrPerPage = 4;

    public function __construct(AdsRepository $AdsRepository)
    {
        $this->AdsRepository = $AdsRepository;
    }

    public function index()
    {
        $ads = $this->AdsRepository->getPaginate($this->nbrPerPage);
        $links = $ads->setPath('')->render();
        return view('ads', compact('ads', 'links'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $ads = $this->AdsRepository->store($request->all());
        return redirect('ads')->withOk("L'annonce a été créé.");
    }

    public function show($id)
    {
        $ads = $this->AdsRepository->getById($id);
        return view('adshow',  compact('ads'));
    }

    public function edit($id)
    {
        $id_ads = Auth::id();
        $ads = $this->AdsRepository->getById($id);
        if($id_ads == $ads['id_user'])
        {
        return view('adsedit',  compact('ads'));
        }
        return redirect('ads')->withOk("Vous n'êtes pas autoriser");
    }

    public function update(AdsUpdateRequest $request, $id)
    {
        $this->AdsRepository->update($id, $request->all());
        
        return redirect('ads')->withOk("L'utilisateur  a été modifié.");
    }

    public function destroy($id)
    {   
        $id_ads = Auth::id();
        $ads = $this->AdsRepository->getById($id);
        if($id_ads == $ads['id_user'])
        {
            $this->AdsRepository->destroy($id);
            return redirect('ads')->withOk("Annonce Supprimé");
        }
        return redirect('ads')->withok("Vous n'êtes pas autoriser");
    }
}
