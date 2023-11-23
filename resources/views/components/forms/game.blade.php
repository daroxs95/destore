@props(['game', 'tags' => []])
<br/>

<form
    @if($game  != null)
        action="{{route('games.update', ['game' => $game])}}" method="post" enctype="multipart/form-data"
    @else
        action="{{route('games.store')}}" method="post"
    @endif
    enctype="multipart/form-data"
>
    @csrf

    <!-- Tags elements -->
    <div class="vstack">
        <label for="tagsSelect" class="">{{__("Tags")}}</label>
        <select id="tagsSelect">
            <option value="">Select an tag to add</option>
            @foreach($tags as $tag)
                <option value="{{$tag->id}}" title="{{$tag->description}}">{{$tag->name}} </option>
            @endforeach
        </select>
        <!-- Hidden input to store selected options -->
        <input type="hidden" id="selectedTags" name="selected_tags"
               @if($game != null and $game->tags !=null)value="@foreach($game->tags as $tag){{$tag->id}} @endforeach"@endif>
        <!-- Display added options -->
        <div id="addedTags" class="hstack f-wrap">
        </div>
    </div>

    <br/>
    <br/>

    <div class="vstack">
        <label for="title" class="">{{__("Title")}}</label>
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

    @if($game != null and $game->media->first() != null)
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

@if($game != null)
    <div class="mt-def-l">
        <h3 class="">{{__("Danger zone")}}</h3>
        <div>
            <button data-modal-open="game-delete">{{__("Delete game")}}</button>
        </div>

        <dialog class="card login-modal p-def common-modal" id="game-delete">
            <div class="f-jc-end">
                <button data-modal-close="game-delete"
                        class="closeModalButton stealth font-icon-button p-0 f-ai-center f-jc-center">&times
                </button>
            </div>
            <div class="vstack f-ai-center p-def">
                <div class="vstack w-100">
                    <h3 class="p-0">{{__("Want to delete the game, ")}} {{ $game->title }}?</h3>
                    <br/>
                    <form class="f-ai-center v-stack" action="{{ route('games.destroy', ['game' => $game]) }}"
                          method="post">
                        @csrf
                        <button class="pointer w-100" type="submit">{{__("Continue deletion")}}</button>
                    </form>
                </div>
            </div>
            <br/>
        </dialog>

    </div>
@endif
