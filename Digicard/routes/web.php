<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('Card/index', function () {
	$cards = Card::orderBy('name')
        ->paginate(10);
    return view('Card.index', compact('cards'));
});

Route::resource('Card', 'CardController')->middleware('auth');
Route::get('ShareCard', ['as' => 'ShareCard', 'uses' =>'CardController@share']);
Route::post('CardShared', ['as' => 'CardShared', 'uses' =>'CardController@registerShare']);

