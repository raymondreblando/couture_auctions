<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasUlids, HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'user_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'fullname',
        'username',
        'email',
        'gender',
        'contact_number',
        'address',
        'password',
        'role_id',
        'google_id',
        'is_active',
        'is_verified',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'google_id'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class, 'user_id', 'user_id');
    }

    public function identity(): HasOne
    {
        return $this->hasOne(Identity::class, 'user_id', 'user_id');
    }

    public function bids(): HasMany
    {
        return $this->hasMany(Bid::class, 'user_id', 'user_id');
    }

    public function scopeUsers(Builder $query): void
    {
        $query->whereNot('role_id', '01hkvjx8dq4a73dwe9a8tk7rta');
    }

    public function isAdmin(): bool
    {
        return $this->role->role_name === 'admin';
    }

    public function getBidAmount(string $id): string|null
    {
        return $this->bids()->where('product_id', $id)->value('amount');
    }

    protected function fullname(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => Str::title($value)
        );
    }
}
