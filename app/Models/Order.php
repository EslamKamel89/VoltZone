<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 *
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $grand_total
 * @property string|null $payment_method
 * @property string|null $payment_status
 * @property string $status
 * @property string|null $currency
 * @property string|null $shipping_amount
 * @property string|null $shipping_method
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Address> $addresses
 * @property-read int|null $addresses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderItem> $orderItems
 * @property-read int|null $order_items_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\OrderFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereGrandTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereShippingAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereShippingMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereUserId($value)
 * @property-read \App\Models\Address|null $address
 * @mixin \Eloquent
 */
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
    public function address(): HasOne {
        return $this->hasOne(Address::class, 'order_id');
    }
}
