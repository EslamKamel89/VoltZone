<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
