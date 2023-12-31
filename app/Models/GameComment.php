<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameComment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'game_id', 'parent_id', 'body'];

    protected $casts = [
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function replies()
    {
        return $this->hasMany(GameComment::class, 'parent_id');
    }
}
