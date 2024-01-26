<?php

use App\Models\Game;
use App\Models\User;
use App\Services\ProfanityFilter;

beforeEach(function () {
    $fakeProfanity = Mockery::mock(ProfanityFilter::class);
    $fakeProfanity->shouldReceive('filter')->andReturn(null);
    $this->app->instance(ProfanityFilter::class, $fakeProfanity);
});

test('should show new game page', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/games/create/new');

    $response->assertOk();
});

test('should create game', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->post('/games', [
            'title' => 'test title',
            'description' => 'test description',
        ]);

    $game = Game::query()
        ->where('title', 'test title')
        ->where('description', 'test description')
        ->firstOrFail();

    $this->assertNotNull($game);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('/games/'.$game->slug.'/manage');
});

test('should update game', function () {
    $user = User::factory()->create();
    $game = Game::factory()->create(['title' => 'Test game', 'creator_id' => $user->id]);

    $response = $this
        ->actingAs($user)
        ->post('/games/'.$game->slug, [
            'title' => 'test new title',
            'description' => 'test new description',
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('/games/'.$game->slug.'/manage');

    $game->refresh();

    $this->assertSame('test new title', $game->title);
    $this->assertSame('test new description', $game->description);
});

test('should delete game if owned by user', function () {
    $user = User::factory()->create();
    $game = Game::factory()->create(['creator_id' => $user->id]);

    $response = $this
        ->actingAs($user)
        ->post('/games/'.$game->slug.'/delete');

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('/');

    $this->assertNull($game->fresh());
});

test('should delete game if user is admin', function () {
    $user = User::factory()->create(['is_admin' => true]);
    $user2 = User::factory()->create();
    $game = Game::factory()->create(['creator_id' => $user2->id]);

    $response = $this
        ->actingAs($user)
        ->post('/games/'.$game->slug.'/delete');

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('/');

    $this->assertNull($game->fresh());
});

test('should not delete game if owned by another user', function () {
    $user = User::factory()->create();
    $user2 = User::factory()->create();
    $game = Game::factory()->create(['creator_id' => $user2->id]);

    $response = $this
        ->actingAs($user)
        ->post('/games/'.$game->slug.'/delete');

    $response->assertForbidden();

    $this->assertNotNull($game->fresh());
});
