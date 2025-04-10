<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model {
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'slug',
        'images',
        'description',
        'price',
        'is_active',
        'is_featured',
        'in_stock',
        'on_sale',
    ];
    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }
    public function brand(): BelongsTo {
        return $this->belongsTo(Brand::class);
    }
    public function orderItems(): HasMany {
        return $this->hasMany(OrderItem::class,);
    }
    public function orders(): BelongsToMany {
        return $this->belongsToMany(
            Order::class,
            'order_items',
            'product_id',
            'order_id',
        )->withPivot([
            "quantity",
            "unit_amount",
            "total_amount",
        ])->withTimestamps();
    }
}
