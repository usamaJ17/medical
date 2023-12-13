<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalData extends Model
{
    use HasFactory;
    private $table = 'hospital_data';
    protected $fillable = [
        'user_id',
        'working_hours',
        'availableDoctors'
    ];
}
