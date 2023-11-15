<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    <link rel="stylesheet" href=" ">
    @vite(['resources/js/app.js'])
</head>

<body class="">
<header>
    <nav class="f-ai-center">
        <div class="nav-content hstack p-def f-jc-between">
            <h2 class="app-name f-ai-center p-0">
                <a href="/">
                    Destore
                </a>
            </h2>
            <div class="f-ai-center">
                <button id="openModalButton" class="outline">Login</button>
            </div>
        </div>
    </nav>
</header>
<main>
    <div class="">
        {{$slot}}
    </div>
</main>

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
    }

    .nav-content {
        width: 100%;
        margin: auto;
        max-width: var(--max-width);
        height: var(--v-gap-l);
    }

    .app-name {
        font-size: 30px;
    }

    .app-name a {
        padding: 0;
        color: var(--color-text);
    }

    .login-modal {
        margin: auto;
        height: fit-content;
        padding-bottom: var(--v-gap-l);
    }

    .login-modal form {
        padding: 0 var(--v-gap);
        width: 300px;
    }

    #closeModalButton {
        height: 40px;
        width: 40px;
        min-height: var(--v-gap);
        font-size: 1.5rem;
    }
</style>

</html>
