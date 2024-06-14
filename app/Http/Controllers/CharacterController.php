<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;


class CharacterController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        // $user = Auth::user();
        // $characters =  $user->characters;
        $characters = Character::where('user_id', $userId)->get();
        // dd($characters);


        // $characters = Character::all();

        return view('characters.index', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $weapons = Item::all();

        return view('characters.create', compact('weapons'));
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
        $form_data['user_id'] = Auth::id();

        $new_character = Character::create($form_data);

        if ($request->has('weapons')) {
            $new_character->items()->attach($request->weapons);
        }

        return to_route('admin.characters.index', $new_character);
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
      
        $character->load(['items']);
        return view('characters.show', compact('character'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        $character->load('items');
        $weapons = Item::all();
        return view('characters.edit', compact('character', 'weapons'));
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

        // $character->fill($form_data);

        // $character->save();

        $character->update($form_data);

        if ($request->has('weapons')) {
            // $post->tags()->attach($form_data['tags']);
            $character->items()->sync($request->weapons);
        } else {
            $character->items()->detach();
        }


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
