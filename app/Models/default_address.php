<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class default_address extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'address_id'
    ];

    public $timestamps = false;

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function address() : BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    protected $table = 'default_address';
}
