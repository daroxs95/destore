@props(['game'])

@if(session()->has('success_notification'))
    <div class="card p-def">
        {{ session()->get('success_notification') }}
    </div>
    <br/>
@endif

@if(session()->has('error_notification'))
    <div class="card p-def">
        {{ session()->get('error_notification') }}
    </div>
    <br/>
@endif

<form
    @if($game  != null)
        action="{{route('games.update', ['game' => $game])}}" method="post" enctype="multipart/form-data"
    @else
        action="{{route('games.store')}}" method="post"
    @endif
    enctype="multipart/form-data"
>
    @csrf

    <div class="vstack">
        <label for="title" class="text-xs font-semibold uppercase mb-1">{{__("Title")}}</label>
        <input id="title" type="text" name="title" value="{{$game != null ? $game->title : ""}}" placeholder="">
    </div>

    <br/>

    <div class="vstack">
        <label for="description" class="text-xs font-semibold uppercase mb-1">{{__("Description")}}</label>
        <textarea id="description" name="description"
                  placeholder="">{{$game != null ? $game->description : ""}}</textarea>
    </div>

    <br/>

    <div class="hstack f-ai-center">
        <input type="checkbox" id="published" placeholder="" name="published" class="center"
               @if($game != null and $game->release_date != null) checked @endif>
        <label for="published" class="">{{ __('Set as published') }}</label>
    </div>

    <br/>

    @if($game != null )
        <img class="game-details-main-img" src="{{$game->media->first()->getUrl('normal')}}" alt=""/>
    @endif
    <label for="file">File</label>
    <input name="image" type="file"/>

    <br/>
    <br/>


    <div class="hstack ">
        @if($game != null)
            <a href="{{route('games.show', ['game' => $game])}}" class="p-0">
                <button type="button" class="outline">{{__("View game page")}}</button>
            </a>
        @endif

        <button type="submit">
            @if($game != null)
                {{__("Update")}}
            @else
                {{__("Create")}}
            @endif
        </button>
    </div>
</form>
