@props(['comments', 'game_id', 'level' => 0, 'parent_id' => null, 'reply' => true])

@if($comments->count() > 0)
    <div class="comments-container">
        @foreach($comments->filter(fn ($c) => $parent_id != null ? $c->parent_id == $parent_id : $c->parent_id == null) as $comment)
            <div class="hstack f-ai-center">
                @if($parent_id)
                    <img widht="40" height="40" src="{{asset('reply_arrow.svg')}}">
                @endif
                <div class="card p-def comment-card">
                    <p>{{ $comment->body }}</p>
                    by <a class=""
                          href="{{route('users.show', ['id' => $comment->user->id])}}">
                        <strong>{{ $comment->user->name }}</strong>
                    </a>
                </div>
            </div>
            <x-game-comments :comments="$comment->replies" :game_id="$game_id" :parent_id="$comment->id"
                             :level="$level + 1"/>
            @if (($parent_id == null) and $level <= 1)
                <div class="hstack">
                    <img widht="40" height="40" src="{{asset('reply_arrow.svg')}}">
                    <form class="vstack" method="post" action="{{ route('games.comments.store') }}">
                        @csrf
                        <textarea type="text" name="body" required placeholder="" class=""></textarea>
                        <input type="hidden" name="game_id" value="{{ $game_id }}"/>
                        <input type="hidden" name="parent_id" value="{{ $comment->id }}"/>
                        <button type="submit" class="stealth w-min-content">{{__("Reply")}}</button>
                    </form>
                </div>
            @endif
        @endforeach
    </div>
@endif
