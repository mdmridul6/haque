<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;


class Clients extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::deleting(function ($user) {
            if ($user->image && $user->image !== "frontend/assets/img/150x80.png") {
                $path = public_path($user->image);
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
        });
    }
}
