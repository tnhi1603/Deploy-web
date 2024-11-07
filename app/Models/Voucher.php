<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Voucher extends Model
{
    use HasFactory;
    protected $table = 'vouchers';
    protected $fillable = [
        'code',
        'rule',
        'minimum',
        'start_date',
        'end_date',
        'discount',
        'type',
        'quantity',
        'status',
    ];

    public $timestamps = false;

    public function order() : HasMany
    {
        return $this->hasMany(Orders::class);
    }
}
