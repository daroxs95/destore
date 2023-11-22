<a href="{{route('games.show', ['game' => $game])}}" class="game-card-anchor">
    <li class="card game-card cool-highlight">
        <img class="game-image" src="{{$game->media->first()->getUrl('preview')}}" alt=""/>
        <div class="game-data p-def">
            <h2 class="">{{$game->title}}</h2>
            <div class="hstack f-wrap tags-list">
                @foreach($game->tags as $tag)
                    <x-game-tag :tag="$tag"/>
                @endforeach
            </div>
        </div>
    </li>
</a>
