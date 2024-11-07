<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Brand extends Model
{
    use HasFactory, Searchable;
    protected $fillable = [
        'name',
    ];

    public function products() : HasMany
    {
        return $this->hasMany(Watch::class);
    }

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'description' => $this->description
        ];
    }
    
    protected $table = 'brands';
}
