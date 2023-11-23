<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="" :status="session('status')"/>

    <br />
    <div class="card p-def login-page_login-card">
        <x-forms.login/>
    </div>
</x-guest-layout>
