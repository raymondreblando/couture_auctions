<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GetInTouch extends Model
{
    use HasUlids, HasFactory;

    protected $primaryKey = 'get_in_touch_id';
    protected $keyType = 'string';
    public $incrementing = false;
    

    protected $fillable = [
        'fullname',
        'email',
        'message',
        'reply',
    ];

    protected function fullname(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => Str::title($value)
        );
    }
}
