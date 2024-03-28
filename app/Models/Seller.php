<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_name', 'seller_stock', 'est_shipping_days', 'selling_price'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
