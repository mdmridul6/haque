<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
    ];

    protected static function booted()
    {
        static::deleting(function ($user) {
            if ($user->image && $user->image !== "build/assets/images/users/avater.svg") {
                $path = public_path($user->image);
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
        });

        static::updating(function ($user) {
            // If the image is being changed
            if ($user->isDirty('image')) {
                $oldImagePath = public_path($user->getOriginal('image'));

                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }
        });
    }



    protected function fullName(): Attribute
    {

        return Attribute::make(get: fn() => $this->first_name . ' ' . $this->last_name);
    }
}
