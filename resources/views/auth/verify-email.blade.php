<x-guest-layout>

    <br/>
    <div class="card p-def login-page_login-card">
        <form class="vstack login-form" method="POST" action="{{ route('verification.send') }}">
            @csrf

            <h3>{{__("Verify email")}}</h3>

            <div class="">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <br/>

            <div class="vstack">
                <button>
                    {{ __('Resend Verification Email') }}
                </button>
            </div>
        </form>

        <br/>

        <form class="vstack login-form" method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="">
                {{ __('Log Out') }}
            </button>
        </form>

    </div>

</x-guest-layout>
