<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Game extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'games';

    protected $fillable = ['title', 'description', 'creator_id', 'release_date'];

    protected $casts = [
        'release_date' => 'datetime',
    ];

    protected static function booted()
    {
        // TODO: this sometimes when seeding causes an UniqueConstraintViolationException
        static::creating(function ($game) {
            $game->slug = $game->slug ?? $game->createUniqueSlug();
        });

        static::deleting(function (Game $game) {
            // Delete related comments
            $game->comments()->delete();
        });

        static::updated(function ($game) {
            Cache::forget('landing.topGames');
        });
    }

    public function getImageUrl($conversion)
    {
        return ($this->media->isNotEmpty())
            ? $this->media->first()->getUrl($conversion)
            : '/media/default/conversions/default-'.$conversion.'.jpg';
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(GameComment::class);
    }

    public function allComments()
    {
        return $this->comments()->with('allComments');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function createUniqueSlug()
    {
        $slug = Str::slug($this->title);
        $slugsCount = Game::whereRaw("slug REGEXP '^{$slug}_[0-9]+$'")->orWhere('slug', $slug)->count();

        return $slugsCount == 0 ? $slug : $slug.'_'.$slugsCount;
    }

    public function scopeIsReleased($query)
    {
        return $query->whereNotNull('release_date');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('normal')
            ->fit(Manipulations::FIT_CROP, 1200, 800)
            ->nonQueued();
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 350, 250)
            ->nonQueued();
        $this
            ->addMediaConversion('thumbnail')
            ->fit(Manipulations::FIT_CROP, 50, 50)
            ->nonQueued();

    }
}
