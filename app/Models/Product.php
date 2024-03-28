<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'added_by', 'thumbnail_image', 'currency_symbol', 'mrp', 'is_wholesale',
        'rating', 'rating_count', 'description', 'video_link', 'awafx_choice', 'best_selling',
        'est_shipping_time', 'is_refurbished', 'is_in_cart', 'is_in_wishlist', 'meta_title',
        'meta_description', 'meta_img', 'brand_id'
    ];

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }

    public function themes()
    {
        return $this->belongsToMany(Theme::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function sellers()
    {
        return $this->belongsToMany(Seller::class);
    }

    public function crossSellings()
    {
        return $this->belongsToMany(CrossSelling::class);
    }
}
