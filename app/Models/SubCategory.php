<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SubCategory extends Model
{
    use HasUlids, HasFactory;

    protected $primaryKey = 'subcategory_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'subcategory_name',
    ];

    protected function subcategoryName(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => Str::ucfirst($value),
        );
    }
}
