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
            @auth
                @if( auth()->user()->is_admin)
                    @foreach($admin_menu_items as $item)
                        @if(request()->routeIs($item['route']))
                            <a href="{!! $item['url'] ?? route($item['route']) !!}"
                               class="active button stealth"
                               aria-current="page">{{$item['label']}}</a>
                        @else
                            <a href="{!! $item['url'] ?? route($item['route']) !!}"
                               class="button stealth">{{$item['label']}}</a>
                        @endif
                    @endforeach
                @endif
            @endauth
        </div>
        <div class="f-ai-center">
            @guest
{{--                <button data-modal-open="loginModal" class="outline">{{__("Login")}}</button>--}}
                <a href="{{route('login')}}" class="button outline">{{__("Login")}}</a>
            @endguest
            @auth
                <div class="hstack f-ai-center">
                    <p class="p-0">Welcome, {{ Auth::user()->name }}</p>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="pointer" type="submit">{{__("Logout")}}</button>
                    </form>
                </div>
            @endauth
        </div>
    </div>
</nav>
