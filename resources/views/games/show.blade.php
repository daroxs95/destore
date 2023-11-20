<x-site-layout title="{{$game->title}}">

    <main class="content p-def">
        <ul class="hstack f-wrap">
            @foreach($game->tags as $tag)
                <x-game-tag :tag="$tag"/>
            @endforeach
        </ul>

        <div class="mb-2 font-semibold">
            Created by: <a class="underline"
                           href="{{route('users.show', ['id' => $game->creator->id])}}">{{$game->creator->name}}</a>
        </div>
        <div>
            Released in: {{$game->release_date}}
        </div>
        <img src="" alt="" />
        <p>
            {{$game->description}}
        </p>
    </main>
</x-site-layout>
