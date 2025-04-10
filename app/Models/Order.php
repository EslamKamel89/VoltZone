<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model {
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;
    protected  $fillable = [
        "user_id",
        "grand_total",
        "payment_method",
        "payment_status",
        "status",
        "currency",
        "shipping_amount",
        "shipping_method",
        "notes",
    ];
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function orderItems(): HasMany {
        return $this->hasMany(OrderItem::class,);
    }
    public function products(): BelongsToMany {
        return $this->belongsToMany(
            Product::class,
            'order_items',
            'order_id',
            'product_id',
        )->withPivot([
            "quantity",
            "unit_amount",
            "total_amount",
        ])->withTimestamps();
    }
}
