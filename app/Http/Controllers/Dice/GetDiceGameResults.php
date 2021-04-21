<?php
// declare(strict_types=1);

namespace App\Http\Controllers\Dice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// use Psr\Http\Message\ResponseInterface;

/**
 * Controller for showing results.
 */
class GetDiceGameResults extends Controller
{
    public function index()
    {
        $data = [
            "playerLastHandSum" => $_SESSION["game"]->playerLastHandSum,
            "roundPointsPlayer" => $_SESSION["game"]->protocol["player"],
            "roundPointsComputer" => $_SESSION["game"]->protocol["computer"],
            "playerTotalScore" => $_SESSION["game"]->playerTotalScore,
            "computerTotalScore" => $_SESSION["game"]->computerTotalScore,
            "playerWin" => $_SESSION["game"]->playerWin,
        ];

        return view('dicegameresults', $data);
    }
}
