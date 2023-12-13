<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccineHistory extends Model
{
    use HasFactory;
    protected $table = 'vaccine_history';
    protected $fillable = [
        'user_id',
        'hasReceivedCovidVaccine',
        'dosesReceived',
        'timeSinceLastVaccination',
        'immunizationHistory',
    ];
}
