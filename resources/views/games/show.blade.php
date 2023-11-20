<x-site-layout title="{{$game->title}}">

    <main class="content p-def">
        <ul class="hstack f-wrap">
            @foreach($game->tags as $tag)
                <x-game-tag :tag="$tag"/>
            @endforeach
        </ul>

        <h1>{{$game->title}}</h1>
        <div class="">
            {{__("Created by")}}:
            <a class="" href="{{route('users.show', ['id' => $game->creator->id])}}">{{$game->creator->name}}</a>
        </div>
        <div>
            {{__("Released in")}}: {{$game->release_date->formatLocalized('%B %e, %Y')}}
        </div>
        <br />
        <img class="game-details-main-img" src="{{$game->media->first()->getUrl('normal')}}" alt="" />
        <br />
        <p>
            {{$game->description}}
        </p>
    </main>
</x-site-layout>
