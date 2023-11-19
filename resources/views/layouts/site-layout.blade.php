<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title}}</title>
    <link rel="icon" type="image/svg+xml" href="favicon.svg" sizes="any">
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
        <button class="stealth font-icon-button p-0 f-ai-center f-jc-center" id="closeModalButton">&times</button>
    </div>
    <x-forms.login/>
</dialog>

</body>

<script>
    const openModalButton = document.getElementById('openModalButton');
    const closeModalButton = document.getElementById('closeModalButton');
    const loginModal = document.getElementById('loginModal');

    openModalButton.addEventListener('click', () => {
        loginModal.showModal();
    });

    closeModalButton.addEventListener('click', () => {
        loginModal.close();
    });
</script>

<style>
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
    }

    .login-modal::backdrop {
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
    }

    #closeModalButton {
        height: 40px;
        width: 40px;
        min-height: var(--v-gap);
        font-size: 1.5rem;
    }
</style>

</html>