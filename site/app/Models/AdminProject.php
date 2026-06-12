<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProject extends Model
{
    protected $table = 'admin_projects';

    protected $fillable = [
        'tag', 'title', 'slug', 'image_path', 'alt_text',
        'year', 'zone', 'description', 'details',
        'stats', 'gallery', 'is_published',
    ];

    protected $casts = [
        'stats'        => 'array',
        'gallery'      => 'array',
        'is_published' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::creating(function (AdminProject $p) {
            if (empty($p->slug)) {
                $p->slug = Str::slug($p->title);
            }
        });
    }

    /** URL de l'image principale (gère public/ et storage/) */
    public function imageUrl(): string
    {
        if (!$this->image_path) return '';
        return self::resolveUrl($this->image_path);
    }

    /** URLs de la galerie */
    public function galleryUrls(): array
    {
        if (empty($this->gallery)) return [];
        return array_map(fn($p) => self::resolveUrl($p), $this->gallery);
    }

    /** Chemin commençant par images/ → asset(), sinon Storage::url() */
    public static function resolveUrl(string $path): string
    {
        if (str_starts_with($path, 'images/') || str_starts_with($path, 'documents/')) {
            return asset($path);
        }
        return Storage::url($path);
    }
}
