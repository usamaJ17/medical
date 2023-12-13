<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstName',
        'email',
        'password',
        'lastName',
        'dateOfBirth',
        'gender',
        'country',
        'weight',
        'height',
        'passportNumber',
        'postalCode',
        'city',
        'bloodType',
        'address',
        'email_verified_at',
        'currency',
        'websiteUrl',
        'location',
        'phoneNumber',
        'name'
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

    /**
     * Get the user's travel.
     */
    public function travel()
    {
        return $this->hasOne(UserTravel::class);
    }
    /**
     * Get the user's diagnose.
     */
    public function diagnose()
    {
        return $this->hasOne(UserDiagnose::class);
    }
    /**
     * Get the user's emergency.
     */
    public function emergency()
    {
        return $this->hasMany(UserEmergency::class);
    }
    /**
     * Get the user's lifestyle.
     */
    public function lifestyle()
    {
        return $this->hasOne(UserLifestyle::class);
    }
    /**
     * Get the user's immun.
     */
    public function immun()
    {
        return $this->hasOne(UserImmun::class);
    }
}
