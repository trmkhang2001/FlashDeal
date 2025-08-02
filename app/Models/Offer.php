<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'offer',
        'code',
        'url',
        'store_id',
        'description',
        'short_description',
        'color',
        'is_verified',
        'is_approved',
    ];

    public function store()
    {
        return $this->belongsTo(DealStore::class, 'store_id');
    }
    public function scopeApproved($q)
    {
        return $q->where('is_approved', 1);
    }
}
