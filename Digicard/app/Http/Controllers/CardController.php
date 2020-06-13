<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CardRequest;
use App\Http\Controllers\Route;
use App\Card;
use App\User;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cards = Card::where('id_user', auth()->user()->id)
        ->orderBy('name')
        ->paginate(10);

        if($cards)
            return view('Card.index', compact('cards'));
        else
           return view('Card.index', compact('cards')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Card.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CardRequest $request)
    {
        //
        $user = auth()->user();

        $card = new Card;
        $card -> name = $request -> name;
        $card -> company = $request -> company;
        $card -> email = $request -> email;
        $card -> telephone = $request -> telephone;
        $card -> id_user = $user -> id;

        if($card -> save())
            return redirect()->route('Card.index')->with('info','Card created successfully!');
        else
            return redirect()->route('Card.index')->with('error','Card was not created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //        
        $user = User::findOrFail($id);

        return view('Card.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $card = Card::findOrFail($id);
        return view('Card.edit', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CardRequest $request, $id)
    {
        //
        $card = Card::findOrFail($id);
        $card -> name = $request -> name;
        $card -> company = $request -> company;
        $card -> email = $request -> email;
        $card -> telephone = $request -> telephone;
        if($card -> save())
            return redirect()->route('Card.index')->with('info','Card updated successfully!');
        else
            return redirect()->route('Card.index')->with('error','Card was not updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $card = Card::findOrFail($id);

        if(Card::destroy($id))
            return redirect()->route('Card.index')->with('info','Card was removed successfully!');
        else
            return redirect()->route('Card.index')->with('error','Card was not removed');
    }

    /**
     * Gets users to share info with.
     *
     * @return \Illuminate\Http\Response
     */
    public function share()
    {
        //        
        $users = User::where('id', '!=', auth()->user()->id)->get();
        $owner = User::where('id', auth()->user()->id)->first();

        return view('Card.share', compact('users', 'owner'));
    }

    /**
     * Registers share.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function registerShare(Request $request)
    {
        //        
        $owner = User::where('id', auth()->user()->id)->first();
        $card = new Card;
        $card -> name = $owner -> name;
        $card -> company = $owner -> company;
        $card -> email = $owner -> email;
        $card -> telephone = $owner -> telephone;
        $card -> id_user = $request -> user;
        if($card -> save())
            return redirect()->route('Card.index')->with('info','Card shared successfully!');
        else
            return redirect()->route('Card.index')->with('error','Card was not shared.');
    }
}
