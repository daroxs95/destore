<x-site-layout title="Destore | Games">
    <main>
        <ul class="games-grid">
            @foreach($games as $game)

                <li class="card cool-highlight">
                    <h2 class="">{{$game->title}}</h2>
                    <a href="{{route('games.showUI', ['game' => $game])}}" class="">
                        View more
                    </a>
                </li>
            @endforeach
        </ul>
    </main>

    <style>
        .games-grid {
            max-width: var(--max-width);
            margin: auto;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(var(--game-card-width), 1fr));
            grid-gap: 1rem;
            padding: 1rem;
        }
    </style>
</x-site-layout>
