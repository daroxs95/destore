<x-guest-layout>
    <x-auth-session-status class="" :status="session('status')"/>

    <div class="card p-def login-page_login-card">
        <form class="vstack login-form" method="POST" action="{{ route('register') }}">
            @csrf

            <h3>{{__("Register")}}</h3>
            <div class="vstack">
                <label for="name" class="">{{__('Name')}}</label>
                <input type="text" id="name" name="name" class="" :value="old('name')" required autofocus
                       autocomplete="name">
                <x-input-error :messages="$errors->get('name')" class=""/>
            </div>

            <div class="vstack">
                <label for="email" class="">{{__('Email')}}</label>
                <input type="email" id="email" name="email" class="" :value="old('email')" required autofocus
                       autocomplete="email">
                <x-input-error :messages="$errors->get('email')" class=""/>
            </div>

            <div class="vstack">
                <label for="password" class="">{{__('Password')}}</label>
                <input type="password" id="password" name="password" class="" required autofocus
                       autocomplete="new-password">
                <x-input-error :messages="$errors->get('password')" class=""/>
            </div>

            <div class="vstack">
                <label for="password_confirmation" class="">{{__('Confirm Password')}}</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="" required
                       autofocus
                       autocomplete="new-password">
                <x-input-error :messages="$errors->get('password_confirmation')" class=""/>
            </div>

            <br/>
            <button type="submit" class="">
                {{ __('Register') }}
            </button>
            <div class="f-jc-center">
                <a class="button stealth" href="{{ route('login') }}">
                    {{ __('or login') }}
                </a>
            </div>
        </form>
    </div>

</x-guest-layout>
