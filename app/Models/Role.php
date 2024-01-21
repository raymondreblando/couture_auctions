<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasUlids, HasFactory;

    protected $primaryKey = 'role_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'role_name'
    ];

    public function scopeUser(Builder $query): string
    {
        return $query->where('role_name', 'user')
            ->value('role_id');
    }
}
