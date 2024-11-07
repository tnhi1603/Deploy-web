<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Watch extends Model
{
    use HasFactory, SoftDeletes, Searchable;
    public static function boot() {
        parent::boot();

        self::creating(function ($model) {

        });
    }

    protected $fillable = [
        'name',
        'price',
        'discount',
        'storage',
        'brand_id',
        'slug',
        'category_id',
        'description',
        'img1',
        'img2',
        'img3',
    ];

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Orders::class, 'Orders_items', 'watch_id', 'order_id');
    }

    public function carts(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'carts', 'watch_id', 'user_id');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function post():HasMany
    {
        return $this->hasMany(Post::class);
    }

    // Search ở trường nào
    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
        ];
    }

    protected $table = 'watches';
}
