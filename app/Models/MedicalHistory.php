<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    use HasFactory;
    protected $table = 'medical_history';
    protected $fillable = [
        'user_id',
        'medication',
        'sicknessHistory',
        'medicalCondition',
        'surgicalHistory',
        'allergy',
        'medicationTypes',
        'customInputMedications',
    ];
}
