<a href="{{route('games.show', ['game' => $game])}}" class="game-card-anchor">
    <li class="card game-card cool-highlight">
        @if($game != null and $game->media->first() != null)
            <img class="game-image" src="{{$game->media->first()->getUrl($big? 'normal' :'preview')}}" alt=""/>
        @else
            <img class="game-image" src="{{asset('no_image.jpg')}}" alt=""/>
        @endif
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
