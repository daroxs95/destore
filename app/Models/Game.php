<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Game extends Model
{
    use HasFactory;

    protected $table = 'games';

    protected $fillable = ['title', 'description'];

    protected static function booted()
    {
        // TODO: this sometimes when seeding causes an UniqueConstraintViolationException
        static::creating(function ($game) {
            $game->slug = $game->slug ?? Str::slug($game->title);
        });
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
