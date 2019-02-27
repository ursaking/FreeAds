<?php
use Illuminate\Support\Facades\Input;
use App\ads;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['verify' => true]);
Route::resource('user', 'UserController');
Route::resource('ads', 'AdsController');
Route::resource('chats', 'ChatsController');
//Route::resource('search', 'SearchController');
Route::get('/message', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');
Route::get('/ads', 'AdsController@index')->name('ads');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('block', 'BlockController');
Route::post('/search',function(){
	$search = Input::get('search');
	if($search != ""){
		$ads = Ads::where('titre', 'LIKE', '%'. $search . '%')->get();
		if(count($ads) > 0){
			return view('ads')->withDetails($ads)->withQuery($search);
		}
	}
	return view('ads')->withMessage("no data found!");
});

Route::get('profile', function () {
    // Only verified users may enter...
})->middleware('verified');
