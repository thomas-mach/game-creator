<?php

namespace App\Http\Controllers\api;

use App\Models\Character;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index(Request $request)
    {
        $characters = Character::all();
       



        return response()->json([
            'characters' => $characters,
          

        ]);
    }
}
