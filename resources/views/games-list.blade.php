<x-site-layout title="Destore | Games">
    <ul class="games-grid">
        @foreach($games as $game)

            <li class="card cool-highlight">
                <h2 class="">{{$game->title}}</h2>
            </li>
        @endforeach
    </ul>
    <style>
        .games-grid {
            max-width: var(--max-width);
            margin: auto;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(var(--game-card-width), 1fr));
            grid-gap: 1rem;
            padding: 1rem;
        }

        .card {
            background-color: var(--app-bg-light);
            box-shadow: none;
            height: 350px;
            border-radius: var(--border-radius-2);
            border-width: 0;
        }
    </style>
</x-site-layout>
