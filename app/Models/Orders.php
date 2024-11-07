<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'status',
        'address_id',
        'total_prices',
        'discount',
        'voucher_id',
        'ship_fee',
        'gift',
        'description',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function watches(): BelongsToMany
    {
        return $this->belongsToMany(Watch::class, 'order_items', 'order_id', 'watch_id')->withPivot(['quantity', 'price'])->withTrashed();
    }

    public function voucher(): BelongsTo
    {
        return $this->belongsTo(Voucher::class);
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payments::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    protected $table = 'orders';
}
