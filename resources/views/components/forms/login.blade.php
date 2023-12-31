<form class="vstack login-form" method="POST" action="{{ route('login') }}">
    @csrf

    <h3>{{__("Login")}}</h3>
    <div class="vstack">
        <label for="email" class="">{{__('Email')}}</label>
        <input type="email" id="email" name="email" class="" placeholder="" required autofocus autocomplete>
        <x-input-error :messages="$errors->get('email')" class=""/>
    </div>

    <div class="vstack">
        <label for="password" class="">{{__('Password')}}</label>
        <input type="password" id="password" name="password" placeholder="" class="" required>
        <x-input-error :messages="$errors->get('password')" class=""/>
    </div>

    <div class="hstack f-ai-center">
        <input type="checkbox" id="remember" placeholder="" name="remember" class="center">
        <label for="remember" class="">{{ __('Remember me') }}</label>
    </div>


    @if (Route::has('password.request'))
        <a class=""
           href="{{ route('password.request') }}">
            {{ __('Forgot your password?') }}
        </a>
    @endif

    <button type="submit" class="">
        {{ __('Log in') }}
    </button>

    <div class="f-jc-center">
        <a class="button stealth" href="{{ route('register') }}">
            {{ __('or register') }}
        </a>
    </div>
</form>

