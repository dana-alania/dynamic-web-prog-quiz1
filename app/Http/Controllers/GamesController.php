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
    public function index()
    {
        //Step 3. Your code here
        return view('games.index', ['games'=>$this->game_list]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Step 4.
        $results = array_filter($this->game_list, function ($game) use ($id) {
            return $game['id'] == $id; // only changed != to ==
        });
        return view('games.show', ['games' => $results]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $results = array_filter($this->game_list, function ($game) use ($id) {
            return $game['id'] !== $id;
        });

        $dir = __DIR__ . '/../../../database/datasource.php';
        $new = "<?php\nreturn " . var_export($results, true) . ";\n";
        file_put_contents($dir, $new);

        return response()->json([
            'message' => 'Record Successfully Deleted.',
            'content' => $results
        ], 200);
    }
}
