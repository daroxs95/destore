<x-site-layout title="{{$user->name}}">
    <main class="content p-def">

        {{$user->email}}
        {{$user->created_at}}

        <h2 class="">Games by this creator</h2>
        <ul class="">
            @foreach($user->games as $game)
                <li>
                    <a href="{{route('games.showUI', ['game' => $game])}}">{{$game->title}}</a>
                </li>
            @endforeach
        </ul>
    </main>
</x-site-layout>
