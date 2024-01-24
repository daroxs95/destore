<div>
    @if ($errors->has('user_id'))
        <p class="text-red-500">{{ $errors->first('user_id') }}</p>
    @endif
    @if (auth()->user()->id == $user->id)
        <button data-modal-open="pat-request">{{__("Request PAT")}}</button>
        <br />
        <br />
    @endif
    <button data-modal-open="user-delete">{{__("Delete user")}}</button>
</div>

<dialog class="card login-modal p-def common-modal" id="user-delete">
    <div class="f-jc-end">
        <button data-modal-close="user-delete"
                class="closeModalButton stealth font-icon-button p-0 f-ai-center f-jc-center">&times
        </button>
    </div>
    <div class="vstack f-ai-center p-def">
        @auth
            <div class="vstack w-100">
                <h3 class="p-0">{{__("Want to delete the user, ")}} {{ $user->name }}?</h3>
                <br/>
                <form class="f-ai-center v-stack" action="{{ route('profile.destroy') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <button class="pointer w-100" type="submit">{{__("Continue deletion")}}</button>
                </form>
            </div>
        @endauth
    </div>
    <br/>
</dialog>

@if (auth()->user()->id == $user->id)
<dialog class="card login-modal p-def common-modal" id="pat-request">
    <div class="f-jc-end">
        <button data-modal-close="pat-request"
                class="closeModalButton stealth font-icon-button p-0 f-ai-center f-jc-center">&times
        </button>
    </div>
    <div class="vstack f-ai-center p-def">
        @auth
            <div class="vstack w-100">
                <h3 class="p-0">{{__("Want to request a personal access token?")}}</h3>
                <p class="p-0">{{__("Can only be one PAT token active, if you have previously requested on, it will be revoked")}}</p>
                <br/>
                <form class="f-ai-center v-stack" action="{{ route('profile.pat') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <button class="pointer w-100" type="submit">{{__("Continue request")}}</button>
                </form>
            </div>
        @endauth
    </div>
    <br/>
</dialog>
@endif
