<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;

class Game extends Model
{
    use HasFactory;
    protected $table = 'games';
    protected $fillable = ['title', 'description'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
