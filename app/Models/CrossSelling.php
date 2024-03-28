<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrossSelling extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'thumbnail_image', 'mrp', 'rating', 'sales', 'is_wholesale',
        'awafx_choice', 'best_selling', 'carbon_footprint', 'brand_id'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
