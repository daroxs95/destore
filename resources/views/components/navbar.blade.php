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
                <button data-modal-open="user-actions" class="stealth">{{__("Me")}}</button>
            @endauth
        </div>
        <dialog class="card login-modal p-def common-modal" id="user-actions">
            <div class="f-jc-end">
                <button data-modal-close="user-actions"
                        class="closeModalButton stealth font-icon-button p-0 f-ai-center f-jc-center">&times
                </button>
            </div>
            <div class="vstack f-ai-center p-def">
                @auth
                    <div class="vstack w-100">
                        <h3 class="p-0">Welcome, {{ Auth::user()->name }}</h3>
                        <br/>
                        <a class="f-ai-center f-jc-center button stealth"
                           href="{{route('users.show', ['id' => Auth::user()->id])}}">{{__("View profile")}}</a>
                        <form class="f-ai-center v-stack" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="pointer w-100" type="submit">{{__("Logout")}}</button>
                        </form>
                    </div>
                @endauth
            </div>
            <br/>
        </dialog>
    </div>
</nav>
