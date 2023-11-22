<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="" :status="session('status')"/>

    <br/>

    <div class="card p-def login-page_login-card">

        <form class="vstack login-form" method="POST" action="{{ route('password.email') }}">
            @csrf

            <h3>{{__("Forgot password?")}}</h3>
            <!-- Email Address -->
            <div class="forgot-password-text">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <br/>

            <div class="vstack">
                <label for="email" class="">{{__('Email')}}</label>
                <input id="email" class="" type="email" name="email" value="{{old('email')}}" required autofocus/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>

            <br/>
            <div class="vstack">
                <button type="submit">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
            <div class="f-jc-center">
                <a class="button stealth" href="{{ route('login') }}">
                    {{ __('or return to login') }}
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>
