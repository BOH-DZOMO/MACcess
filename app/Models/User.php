<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Ichtrojan\Otp\Models\Otp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'gender',
        'phone_number',
        'is_active',
        "email_verified_at"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function device(){
        return $this->hasOne(Device::class)->latestOfMany();
    }
    public function pendingValidations(){
        return $this->hasMany(PendingValidation::class);
    }

    public function devices(){
        return $this->hasMany(Device::class);
    }

    protected function attendances(){
        return $this->hasMany(Attendance::class);
    }
    protected function rooms(){
        return $this->belongsToMany(Room::class,"room_memberships","user_id","room_id");
    }
    protected function otps(){
        return $this->hasMany(Otp::class,"identifier",'email');
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
