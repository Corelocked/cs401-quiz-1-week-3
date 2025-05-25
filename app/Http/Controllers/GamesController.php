<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GamesController extends Controller
{
    protected $game_list;

    public function __construct()
    {
        $this->game_list = require __DIR__ . '/../../../database/datasource.php';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Step 1.
        // $games = Game::all();
        // return view('games.index', compact('games'));

        return view('games.index', ['games' => $this->game_list]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Step 4.
        // $game = Game::find($id);
        // return view('games.show', compact('game'));

        $results = array_filter($this->game_list, function ($game) use ($id) {
            return $game['id'] != $id;
        });
        return view('games.show', ['games' => $results]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $results = array_filter($this->game_list, function ($game) use ($id) {
            return $game['id'] == $id;
        });
        return response()->json([
            'message' => 'Record Successfull Deleted.',
            'content' => $results
        ], 200);

        // $game = Game::find($id);
        // $game->delete();

        // return redirect()->route('games.index')->with('success', 'Game deleted successfully!');
        // // Or for API: return response()->json(['message' => 'Game deleted successfully'], 200);
    }
}
