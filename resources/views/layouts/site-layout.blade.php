<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title}}</title>
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" sizes="any">
    @vite(['resources/js/app.js'])
    @vite(['resources/css/app.css'])
</head>

<body class="">
<header>
    <x-navbar/>
</header>

{{$slot}}

<dialog class="card login-modal p-def" id="loginModal">
    <div class="f-jc-end">
        <button data-modal-close="loginModal"
                class="closeModalButton stealth font-icon-button p-0 f-ai-center f-jc-center" id="closeModalButton">
            &times
        </button>
    </div>
    <x-forms.login/>
</dialog>

@auth
    <div class="notifications-container vstack">
        @if(session()->has('success_notification'))
            <div class="card p-def notification-item slide-up">
                <div class="f-jc-end">
                    <button data-item-hide="notification"
                            class="closeModalButton stealth font-icon-button p-0 f-ai-center f-jc-center">&times
                    </button>
                </div>
                <p class="text-success">
                    {{ session()->get('success_notification') }}
                </p>
            </div>
            <br/>
        @endif

        @if(session()->has('error_notification'))
            <div class="card p-def notification-item slide-up">
                <div class="f-jc-end">
                    <button data-item-hide="notification"
                            class="closeModalButton stealth font-icon-button p-0 f-ai-center f-jc-center">&times
                    </button>
                </div>
                <p class="text-error">
                    {{ session()->get('error_notification') }}
                </p>
            </div>
            <br/>
        @endif
    </div>
@endauth
</body>

<style>
    body {
        margin-bottom: var(--v-gap-l);
        scrollbar-gutter: stable both-edges;
        position: relative;
    }

    html {
        overflow-y: scroll;
    }

    @supports (scrollbar-gutter: stable) {
        html {
            overflow-y: auto;
            scrollbar-gutter: stable;
        }
    }

    @supports (overflow-y: overlay) {
        html {
            overflow-y: overlay;
            scrollbar-gutter: auto;
        }
    }

    header {
        width: 100%;
        top: 0;
        height: var(--v-gap-l);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        position: fixed;
        z-index: 1000;
    }

    .login-modal {
        margin: auto;
        height: fit-content;
        padding-bottom: var(--v-gap-l);
        color: var(--color-text);
    }

    .login-modal::backdrop {
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
    }

    .closeModalButton {
        height: 40px;
        width: 40px;
        min-height: var(--v-gap);
        font-size: 1.5rem;
    }

    .removeTagButton {
        height: 20px;
        width: 20px;
        min-height: 20px;
        font-size: 1.5rem;
    }

    .common-modal {
        width: 300px;
        padding-bottom: var(--v-gap);
    }

    .notifications-container {
        position: fixed;
        bottom: var(--v-gap);
        right: var(--h-gap);
        width: 300px;
        min-width: 300px;
        min-height: 150px;
        display: flex;
        flex-direction: column;
        justify-content: end;
    }

    .notification-item {
        min-height: 100px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        padding: calc(var(--v-gap)) var(--h-gap);
    }
</style>

</html>
