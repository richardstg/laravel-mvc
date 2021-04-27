<?php

namespace App\Http\Controllers\Dice;

use App\Dice\DiceGame;
use App\Dice\DiceHand;
use App\Http\Controllers\RollDices\RollDices;
use Illuminate\Http\Request;
// use Illuminate\Http\Response;
use Tests\TestCase;

/**
 * Test cases for class Dice.
 */
class DiceControllersTest extends TestCase
{
    /**
     *
     */
    public function testGetDiceGame()
    {
        // $request = Request::create('/store', 'POST', [
        //     'title'     =>     'foo',
        //     'text'     =>     'bar',
        // ]);

        // $response = $this->withSession(['game' => null])->get('/dice');

        // $this->session(['answers' => array('something')]);
        $controller = new GetDiceGame();
        $response = $controller->index();
        // $response = $this->call('GET', '/dice');
        // $response = $this->call('POST', '/user', ['name' => 'Taylor']);
        // $this->assertContains('data', $response->content());
        $this->assertEquals($response, $this->get('/dice')->content());
        // // Eller
        // $this->get('/dice')->assertViewHas('data');
        // $this->get('/dice')->assertSeeText('data');
    }

    /**
     *
     */
    public function testGetDiceGamePlay()
    {
        $game = new DiceGame();

        $this->session(['game' => $game]);

        $controller = new GetDiceGamePlay();
        $response = $controller->index();

        $this->assertEquals($response, $this->get('/dice/play')->content());
    }

    /**
     *
     */
    public function testGetDiceGameResults()
    {
        $game = new DiceGame();
        $this->session(['game' => $game]);

        $controller = new GetDiceGameResults();
        $response = $controller->index();

        $this->assertEquals($response, $this->get('/dice/results')->content());
    }

    /**
     *
     */
    public function testPostDiceGame()
    {
        $game = new DiceGame();

        $this->withSession(['game' => $game])->post('/dice')->assertRedirect("/dice/play");
    }

    /**
     *
     */
    public function testPostDiceGamePlay()
    {
        $game = new DiceGame();

        $this->withSession(['game' => $game])->post('/dice/play', ['numDices' => 5])->assertRedirect("/dice/play");
    }

    /**
     *
     */
    public function testPostDiceGameComputerPlay()
    {
        $game = new DiceGame();

        $this->withSession(['game' => $game])->post('/dice/computerplay')->assertRedirect("/dice/results");
    }

    /**
     *
     */
    public function testPostRollDices()
    {
        $diceHand = new DiceHand();

        $this->withSession(['dicehand' => $diceHand])->post('/rolldices', ['rollDices' => true])->assertRedirect("/rolldices");
        $this->withSession(['dicehand' => $diceHand])->post('/rolldices', ['quit' => true])->assertRedirect("/");
    }
}
