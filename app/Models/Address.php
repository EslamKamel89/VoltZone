<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model {
    /** @use HasFactory<\Database\Factories\AddressFactory> */
    use HasFactory;
    protected $fillable = [
        "order_id",
        "first_name",
        "last_name",
        "last_name",
        "phone",
        "street_address",
        "city",
        "state",
        "country",
        "zip_code",
    ];
    public function order(): BelongsTo {
        return $this->belongsTo(Order::class);
    }
}
