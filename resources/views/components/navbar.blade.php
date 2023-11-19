<nav class="f-ai-center">
    <div class="nav-content hstack p-def f-jc-between">
        <div class="hstack f-ai-center m-0">
            <h2 class="app-name f-ai-center p-0">
                <a href="/">
                    Destore
                </a>
            </h2>
            @foreach($menu_items as $item)
                @if(request()->routeIs($item['route']))
                    <a href="{!! $item['url'] ?? route($item['route']) !!}"
                       class="active button stealth"
                       aria-current="page">{{$item['label']}}</a>
                @else
                    <a href="{!! $item['url'] ?? route($item['route']) !!}"
                       class="button stealth">{{$item['label']}}</a>
                @endif
            @endforeach
        </div>
        <div class="f-ai-center">
            @guest
                {{--                <button id="openModalButton" class="outline">{{__("Login")}}</button>--}}
                <a href="{{route('login')}}" class="button outline">{{__("Login")}}</a>
            @endguest
            @auth
                <div class="hstack f-ai-center">
                    <p class="p-0">Welcome, {{ Auth::user()->name }}</p>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">{{__("Logout")}}</button>
                    </form>
                </div>
            @endauth
        </div>
    </div>
</nav>

<style>
    .nav-content {
        width: 100%;
        margin: auto;
        max-width: var(--max-width);
        height: var(--v-gap-l);
    }

    .app-name {
        font-size: 30px;
        margin-right: var(--h-gap);
    }

    .app-name a {
        padding-bottom: 0;
    }

    .nav-content a {
        color: var(--color-text);
        min-height: auto;
    }

    .nav-content a.button {
        color: var(--color-primary);
    }

    .nav-content a:hover {
        text-decoration: none;
        font-size: 14px;
    }

    .nav-content a.active {
        color: var(--color-primary);
        font-weight: bold;
    }
</style>

