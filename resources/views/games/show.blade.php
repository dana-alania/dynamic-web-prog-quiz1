<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Specific Game</title>
    <style>
        body {
            padding: 20px;
        }
    </style>
    </head>

    <body>
        <h1>Game Details</h1>
        @foreach($games as $game)
            <div class="game">
                <h2>{{ $game['title'] }}</h2>
                <p><strong>Game ID:</strong> {{$game['id']}}</p>
                <p><strong>Developer:</strong> {{ $game['developer'] }}</p>
                <p><strong>Publisher:</strong> {{ $game['publisher'] }}</p>
                <p><strong>Genre:</strong> {{ $game['genre'] }}</p>
                <p><strong>Release Date:</strong> {{ $game['releaseDate'] }}</p>
                <p><strong>Platform:</strong> {{ $game['platform'] }}</p>
                <p><strong>Price:</strong> ${{ $game['price'] }}.00</p>

            </div>
        @endforeach


    </body>

</html>
