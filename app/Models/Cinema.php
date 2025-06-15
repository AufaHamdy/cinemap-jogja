<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'website',
        'latitude',
        'longitude',
        'opening_hours',
        'description',
        'rating',
        'total_reviews',
        'facilities',
        'is_active',
    ];

    protected $casts = [
        'facilities' => 'array',
        'is_active' => 'boolean',
        'latitude' => 'float',
        'longitude' => 'float',
        'rating' => 'float',
        'total_reviews' => 'integer',
    ];

    // Scope for only active cinemas
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}