<x-site-layout title="{{$game != null? $game->title : 'Create game'}}">
    <main class="content p-def">
        <x-forms.game :game="$game" :tags="$tags"/>
    </main>
</x-site-layout>
