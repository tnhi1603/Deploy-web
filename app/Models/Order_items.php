<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order_items extends Model
{
    use HasFactory;
    //có thể điền vào
    protected $fillable = [
        'order_id',
        'watch_id',
        'quantity',
        'price',
    ];

    public $timestamps = false;

    public function watches(): BelongsTo
    {
        return $this->belongsTo(Watch::class);
    }

    public function voucher(): BelongsTo
    {
        return $this->belongsTo(Voucher::class);
    }

    protected $table = 'order_items';
}
