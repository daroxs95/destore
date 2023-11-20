<x-site-layout title="Destore | Creators">
    <main class="content p-def">
        <h2 class="">({{$users->count()}}) {{__("Creators")}}</h2>
        <ul class="hstack f-wrap">
            @foreach($users as $user)
                <a class="card user-card p-def m-0 f-ai-center hoverable" href="{{route('users.show', ['id' => $user->id])}}">
                    <li class="hstack p-0 m-0 f-ai-center">
                        <h3 class="p-0 ">{{$user->name}}</h3>
                        <span>{{$user->games->count()}}</span>
                    </li>
                </a>
            @endforeach
        </ul>
    </main>
</x-site-layout>
