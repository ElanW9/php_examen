<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'word' => ['required', 'size:5'],
        ]);

        $gameId = $request->input('game_id');
        $game = Game::findOrFail($gameId);


        if ($game->guesses()->count() >= 6) {
            return response()->json(['error' => 'You have already made six guesses.'], 400);
        }
    }
}
