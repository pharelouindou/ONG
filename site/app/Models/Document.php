<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Document extends Model
{
    protected $fillable = [
        'title', 'doc_type', 'description', 'file_path', 'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function fileUrl(): ?string
    {
        if (!$this->file_path) return null;
        if (str_starts_with($this->file_path, 'documents/')) {
            return asset($this->file_path);
        }
        return Storage::url($this->file_path);
    }
}
