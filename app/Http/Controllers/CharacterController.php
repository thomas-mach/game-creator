<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CharacterController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $userId = Auth::id();

        $user = Auth::user();

        $characters =  $user->characters;

        //$characters = Character::where('user_id',  $userId)->get();
        //dd($characters);
        return view('characters.index', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('characters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:200|min:2',
            'description' => 'nullable|max:1000',
            'type_id' => 'required|numeric',
            'attack' => 'required|max:100|min:1',
            'defence' => 'required|max:100|min:1',
            'speed' => 'required|max:100|min:1',
            'life' => 'required|max:100|min:1',
        ]);

        $form_data = $request->all();

        $new_character = Character::create($form_data);



        return to_route('admin.characters.index', $new_character);
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
        return view('characters.show', compact('character'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        return view('characters.edit', compact('character'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Character $character)
    {

        $request->validate([
            'name' => 'required|max:200|min:2',
            'description' => 'nullable|max:1000',
            'type_id' => 'required|numeric',
            'attack' => 'required|max:100|min:1',
            'defence' => 'required|max:100|min:1',
            'speed' => 'required|max:100|min:1',
            'life' => 'required|max:100|min:1',
        ]);

        $form_data = $request->all();

        $character->fill($form_data);

        $character->save();

        return view('characters.show', compact('character'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        $character->delete();

        return to_route('admin.characters.index',);
    }
}
