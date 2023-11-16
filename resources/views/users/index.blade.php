<x-site-layout title="Destore | Creators">
    <main class="content p-def">
        <h2 class="">Creators list ({{$users->count()}})</h2>
        <ul class="">
            @foreach($users as $user)
                <li class="">
                    <a class="hstack" href="{{route('users.show', ['id' => $user->id])}}">
                        <h3 class="">{{$user->name}}</h3>
                        <span>{{$user->games->count()}}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </main>
</x-site-layout>
