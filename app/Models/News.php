<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'image',
        'short_description',
        'content',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'is_approved',
    ];

    protected $casts = [
        'is_approved' => 'boolean',
    ];

    // Quan hệ với danh mục
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
