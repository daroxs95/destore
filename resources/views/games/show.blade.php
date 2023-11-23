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
            @if($game->release_date == null)
                {{__("Not released")}}
            @else
                {{__("Released in")}}: {{$game->release_date->formatLocalized('%B %e, %Y')}}
            @endif
        </div>
        @auth
            @if( auth()->user()->is_admin or auth()->user()->id ==  $game->creator->id)
                <br/>
                <a class="" href="{{route('games.manage', ['game' => $game])}}">
                    <button class="pointer">
                        {{__("Manage game")}}
                    </button>
                </a>
                <br/>
            @endif
        @endauth
        <br/>
        @if($game != null and $game->media->first() != null)
            <img class="game-details-main-img" src="{{$game->media->first()->getUrl('normal')}}" alt=""/>
        @else
            <img class="game-details-main-img" src="{{asset('no_image.jpg')}}" alt=""/>
        @endif
        <br/>
        <p>
            {{$game->description}}
        </p>

        <br/>
        <br/>
        <div class="f-ai-center f-jc-center">
            @if( $game->download_url != null)
                <a class="" target="_blank" referrerpolicy="no-referrer" href="{{$game->download_url}}">
                    <button class="get-game-btn pointer">
                        {{__("Get the game")}}
                    </button>
                </a>
            @else
                <button disabled class="get-game-btn">
                    {{__("Game is not available yet")}}
                </button>
            @endif
        </div>
        <br/>
        <br/>

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
