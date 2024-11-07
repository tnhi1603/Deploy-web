<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected function password():Attribute
    {
        return Attribute::make();
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Orders::class);
    }

    public function cartProducts():BelongsToMany
    {
        return $this->belongsToMany(Watch::class, 'Carts', 'user_id', 'watch_id')->withPivot('quantity');
    }

    public function defaultAddress():HasOne
    {
        return $this->hasOne(default_address::class);
    }

    public function address():HasMany
    {
        return $this->hasMany(Address::class)->where('id', '!=', $this->defaultAddress->address_id);
    }

    public function post():HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function pOrders(): HasMany
    {
        return $this->hasMany(Orders::class)->where('status', 'Pending');
    }

    public function shOrders(): HasMany
    {
        return $this->hasMany(Orders::class)->where('status', 'Shipping');
    }

    public function suOrders(): HasMany
    {
        return $this->hasMany(Orders::class)->where('status', 'Success');
    }
    // search
    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'email' => $this->email
        ];
    }
}
