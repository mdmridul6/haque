<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected function features(): Attribute
    {
        return Attribute::make(
            get: fn($value) => json_decode($value, true),   // accessor: string → array
            set: fn($value) => json_encode($value),         // mutator: array → string
        );
    }
}
