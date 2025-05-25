<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
<<<<<<< HEAD
    public function index() {

        $games = Game::all();
        return view('games.list', compact('games'));

=======
    public function index()
    {
        //Step 3. Your code here
>>>>>>> efb04b6a6ee88935cdfb8ca2956fef2fbc984f1b
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Step 4.
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
    }
}
