<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags'; // Set the table name (adjust as needed)
    protected $fillable = ['name', 'description'];

    public static $rules = [
        'name' => 'required|unique:tags',
        // Other validation rules for other fields (if any)
    ];
}
