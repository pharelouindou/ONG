<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Article extends Model
{
    protected $fillable = [
        'title', 'slug', 'image_path', 'excerpt',
        'content', 'label', 'published_at', 'is_published',
    ];

    protected $casts = [
        'published_at' => 'date',
        'is_published'  => 'boolean',
    ];

    protected static function booted(): void
    {
        static::creating(function (Article $article) {
            if (empty($article->slug)) {
                $article->slug = Str::slug($article->title);
            }
        });
    }

    public function imageUrl(): string
    {
        if (!$this->image_path) return '';
        if (str_starts_with($this->image_path, 'images/')) {
            return asset($this->image_path);
        }
        return Storage::url($this->image_path);
    }
}
