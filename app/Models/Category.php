<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'sort_order',
        'parent_id',
        'image',
        'is_visible',
        'description',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function stores()
    {
        return $this->hasMany(DealStore::class, 'category_id');
    }
}
