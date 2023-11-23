<x-site-layout title="{{$game != null? $game->title : 'Create game'}}">
    <main class="content">
        <x-forms.game :game="$game"/>
    </main>
</x-site-layout>
