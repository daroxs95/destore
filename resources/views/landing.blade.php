<x-site-layout title="Welcome">

    <main class="content p-def">
        <div class="">
            <h2 class="">Top Commented Games</h2>
            <ul class="top-games-grid">
                @foreach($topGames as $game)
                    <x-game-card :game="$game"/>
                @endforeach
            </ul>
        </div>
    </main>
</x-site-layout>
