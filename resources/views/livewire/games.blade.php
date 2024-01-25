<div>
    <br />
    <div class="f-ai-center f-jc-center">
        <input wire:model.debounce.500ms.live="search" type="text" placeholder="Search games..."/>
    </div>

    <ul class="games-grid">
        @foreach($games as $game)
            <x-game-card :game="$game" />
        @endforeach
    </ul>
</div>
