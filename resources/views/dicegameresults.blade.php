@extends('master')

@section('title', 'Tärningsspelet')

@section('content')

    <h1>Resultat</h1>
    <div class="total-points">
        <h3 style="border-bottom: none">Dina poäng för rundan: {{ $totalPointsPlayer }}</h3>
        @if($playerLastHandSum)
            <h3 style="border-bottom: none">Poäng för senaste kast: {{ $playerLastHandSum }}</h3>
        @endif
    </div>
    <form action="play" method="post">
        <input type="submit" name="rollDices" value="Kasta">
    </form>
    @if($totalPointsPlayer > 0)
        <form action="computerplay" method="post">
            <input type="submit" name="stopRound" value="Stanna">
        </form>
    @endif

    <div class="game-field">
    @if($playerLastHandSum)
        <p class="dice-utf8">
            @foreach($playerLastHandGraphical as $value)
                <i style="font-style: normal" class="{{ $value }}"></i>
            @endforeach
        </p>
        <p>Du kastade: {{ implode(', ', $playerLastHand) }}</p>
    @endif
    </div>

@endsection