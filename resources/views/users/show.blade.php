<x-site-layout title="Destore | {{$user->name}}">
    <main class="content p-def vstack">
        <div>
            <h3 class="">{{__("Profile info")}}</h3>
            <div>
                {{__("Name")}}: {{$user->name}}
            </div>
            @auth
                @if( auth()->user()->is_admin)
                    <div>
                        {{__("Email")}}: {{$user->email}}
                    </div>
                    <div>
                        {{__("Created in")}}: {{$user->created_at->formatLocalized('%B %e, %Y')}}
                    </div>
                @endif
            @endauth
        </div>

        <div class="mt-def-l">
            <h3 class="">{{__("Games by this creator")}}</h3>
            <ul class="games-grid">
                @foreach($user->games as $game)
                    <x-game-card :game="$game"/>
                @endforeach
            </ul>
        </div>
        @auth
            <a class="f-ai-center f-jc-center button stealth"
               href="{{route('games.create')}}">{{__("Release a game")}}</a>
        @endauth

        @auth
            @if( auth()->user()->is_admin or auth()->user()->id == $user->id)
                <div class="mt-def-l">
                    <h3 class="">{{__("Danger zone")}}</h3>
                    <x-profile :user="$user"/>
                </div>
            @endif
        @endauth
    </main>
</x-site-layout>
