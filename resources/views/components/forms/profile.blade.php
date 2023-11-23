<div>
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
    @if ($errors->has('user_id'))
        <p class="text-red-500">{{ $errors->first('user_id') }}</p>
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
