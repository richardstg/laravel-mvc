<?php

declare(strict_types=1);

// use Psr\Http\Message\ResponseInterface;

namespace App\Http\Controllers\Dice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dice\DiceGame;

/**
 * Controller for processing game play.
 */
class PostDiceGame extends Controller
{
    public function index(Request $request)
    {
        if (session('game') === null) {
            // $_SESSION["game"] = new DiceGame(intval($_POST['numberDices']));
            // $_SESSION["game"] = new DiceGame(intval($request->numberDices));
            session(['game' => new DiceGame(intval($request->numberDices))]);
        } else {
            session('game')->newRound();
        }
        return redirect('dice/play');
        // return redirect()->route('dice.play')->with(['success' => 'Post Successfully Created']);
    }
}
