<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <div class="card p-def login-page_login-card">
        <x-forms.login/>
    </div>
</x-guest-layout>
