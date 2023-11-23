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
        <br/>
        <img class="game-details-main-img" src="{{$game->media->first()->getUrl('normal')}}" alt=""/>
        <br/>
        <p>
            {{$game->description}}
        </p>

        <h4>({{$game->comments->count()}}) {{__("Comments")}}</h4>
        <x-game-comments :comments="$game->comments" :game_id="$game->id"/>
        <hr/>
        @auth
            <br/>
            <h4>{{__("Comment")}}</h4>
            <form class="comments-container" method="post" action="{{ route('games.comments.store') }}">
                @csrf
                <div class="form-group">
                    <textarea class="form-control" name="body"></textarea>
                    <input type="hidden" name="game_id" value="{{ $game->id }}"/>
                </div>
                <div class="w-100">
                    <button type="submit" class="btn btn-success">
                        {{__("Add Comment")}}
                    </button>
                </div>
            </form>
        @endauth
    </main>
</x-site-layout>
