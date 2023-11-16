<nav class="f-ai-center">
    <div class="nav-content hstack p-def f-jc-between">
        <div class="hstack f-ai-center">
            <h2 class="app-name f-ai-center p-0">
                <a href="/">
                    Destore
                </a>
            </h2>
            @foreach($menu_items as $item)
                @if(request()->routeIs($item['route']))
                    <a href="{!! $item['url'] ?? route($item['route']) !!}"
                       class="active"
                       aria-current="page">{{$item['label']}}</a>
                @else
                    <a href="{!! $item['url'] ?? route($item['route']) !!}"
                       class="">{{$item['label']}}</a>
                @endif
            @endforeach
        </div>
        <div class="f-ai-center">
            <button id="openModalButton" class="outline">Login</button>
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

    .nav-content a {
        padding: 0;
        color: var(--color-text);
        min-height: auto;
    }
    .nav-content a.active {
        text-decoration: dotted;
    }
</style>

