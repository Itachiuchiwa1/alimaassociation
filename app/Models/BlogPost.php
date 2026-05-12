<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogPost extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'image_path',
        'category_id',
        'author',
        'published_at',
        'is_published',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_published' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    public function getImageUrlAttribute()
    {
        if ($this->image_path) {
            return str_starts_with($this->image_path, 'http')
                ? $this->image_path
                : asset('storage/' . $this->image_path);
        }
        return asset('assets/images/action-formation.jpg');
    }

    public function getFormattedDateAttribute()
    {
        if ($this->published_at) {
            return $this->published_at->locale('fr')->isoFormat('D MMMM YYYY');
        }
        return $this->created_at->locale('fr')->isoFormat('D MMMM YYYY');
    }
}
