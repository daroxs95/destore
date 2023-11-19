<x-site-layout title="Destore | Games">
    <main>
        <ul class="games-grid">
            @foreach($games as $game)
                <x-game-card :game="$game" />
            @endforeach
        </ul>
    </main>
</x-site-layout>
