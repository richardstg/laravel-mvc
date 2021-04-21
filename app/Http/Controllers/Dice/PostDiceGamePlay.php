<?php

declare(strict_types=1);

// use Psr\Http\Message\ResponseInterface;

namespace App\Http\Controllers\Dice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Controller for processing game play.
 */
class PostDiceGamePlay extends Controller
{
    public function index()
    {
        $_SESSION["lastRollPlayer"] = $_SESSION["game"]->playerPlay();

        if ($_SESSION["game"]->playerWin || $_SESSION["game"]->computerWin) {
            // redirectTo(url("/results"));
            // return;
            return (new Response())
                ->withStatus(301)
                ->withHeader("Location", url("/results"));
        } else {
            // redirectTo(url("/play"));
            // return;
            return (new Response())
                ->withStatus(301)
                ->withHeader("Location", url("/play"));
        }
    }
}
