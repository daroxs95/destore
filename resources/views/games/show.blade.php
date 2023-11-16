<x-site-layout title="{{$game->title}}">

    <main class="content p-def">
        <ul class="hstack">
            @foreach($game->tags as $tag)
                <li>
                    {{$tag->name}}
                </li>
            @endforeach
        </ul>

        <div class="mb-2 font-semibold">
            Created by: <a class="underline"
                           href="{{route('users.show', ['id' => $game->creator->id])}}">{{$game->creator->name}}</a>
        </div>
        {{$game->published_at}}
        {{$game->body}}
    </main>
</x-site-layout>
