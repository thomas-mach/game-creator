<?php

namespace App\Http\Controllers;
use App\Models\Character;
use App\Models\Item;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AllController extends Controller
{
    public function index()
    {

        $characters = Character::all();


        return view('characters.all_characters', compact('characters'));
    }

    public function weapons()
    {

        $items = Item::all();
        return view('weapons.all_weapons', compact('items'));
    }
}
