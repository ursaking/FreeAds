<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Search;

class SearchController extends Controller
{
	public function index(Request $req)
	{
		return view('search');
	}
}