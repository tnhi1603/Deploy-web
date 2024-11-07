<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;
    protected $fillable = [
        'watch_id',
        'user_id',
        'quantity'
    ];

    protected $table = 'carts';
}
