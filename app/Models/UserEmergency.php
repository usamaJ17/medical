<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEmergency extends Model
{
    use HasFactory;
    protected $table = 'user_emergency';
    protected $fillable = [
        'user_id',
        'nameOfEmergencyContact',
        'phoneNumber',
        'relationship',
        'email',
        'mediaiId',
    ];
}
