<x-guest-layout>
    <x-auth-session-status class="" :status="session('status')"/>

    <br/>

    <div class="card p-def login-page_login-card">

        <form class="vstack login-form" method="POST" action="{{ route('password.store') }}">
            @csrf

            <h3>{{__("Reset password")}}</h3>
            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="vstack">
                <label for="email" class="">{{__('Email')}}</label>
                <input
                    id="email"
                    class=""
                    type="email"
                    name="email"
                    value="{{old("email", Request::get("email"))}}"
                    required
                    autofocus
                    autocomplete="username"
                />
                <x-input-error :messages="$errors->get('email')" class=""/>
            </div>

            <!-- Password -->
            <div class="vstack">
                <label for="password">{{__('Password')}}</label>
                <input id="password" class="" type="password" name="password" required
                       autocomplete="new-password"/>
                <x-input-error :messages="$errors->get('password')" class=""/>
            </div>

            <!-- Confirm Password -->
            <div class="vstack">
                <label for="password_confirmation">{{__('Confirm Password')}}</label>
                <input id="password_confirmation" class=""
                       type="password"
                       name="password_confirmation" required autocomplete="new-password"/>
                <x-input-error :messages="$errors->get('password_confirmation')" class=""/>
            </div>

            <br/>
            <div class="vstack">
                <button>
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
