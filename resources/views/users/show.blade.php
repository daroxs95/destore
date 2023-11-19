<x-site-layout title="Destore | {{$user->name}}">
    <main class="content p-def">

        {{$user->email}}
        {{$user->created_at}}

        <h2 class="">Games by this creator</h2>
        <ul class="games-grid">
            @foreach($user->games as $game)
                <x-game-card :game="$game" />
            @endforeach
        </ul>
    </main>
</x-site-layout>
