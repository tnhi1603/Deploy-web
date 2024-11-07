<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Payments extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'transaction_id'];
    protected $table = 'payments';

    public function order() : HasOne
    {
        return $this->hasOne(Orders::class);
    }
}
