<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    protected $fillable = ['name', 'description'];

    public static $rules = [
        'name' => 'required|unique:tags',
    ];

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
