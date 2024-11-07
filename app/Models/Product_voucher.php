<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_voucher extends Model
{
    use HasFactory;
    private $table = 'product_voucher';
    private $fillable = [
        'watch_id',
        'voucher_id',
    ];

    public $timestamps = false;
}
