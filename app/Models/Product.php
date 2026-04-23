<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    //
    protected $fillable = [
        'name',
        'slug',
        'description',
        'key_features',
        'short_description',
        'category_id',
        'brand_id',
        'price',
        'discount_price',
        'old_price',
        'cost_price',
        'stock_quantity',
        'sku',
        'main_image',
        'gallery_images',
        'has_variants',
        'variant_type',
        'status',
        'warenty',
        'is_featured',
        'is_trending',
        'is_hot',
        'is_new',
        'average_rating',
        'total_reviews',

    ];

protected $casts = [
    'gallery_images' => 'array',
    'key_features' => 'array',
];

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}

