<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BloodPressureReading extends Model
{
    use HasFactory;

    public const STATUSES = [
        'normal'                      => 'Normal',
        'elevated'                    => 'Elevated',
        'high_blood_pressure_stage_1' => 'High (Stage 1)',
        'high_blood_pressure_stage_2' => 'High (Stage 2)',
        'hypertensive_crisis'         => 'Hypertensive Crisis',
    ];

    protected $fillable = [
        'patient_id',
        'status',
        'systolic_pressure',
        'diastolic_pressure',
        'measured_at',
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function getSystolicBloodPressureAttribute(): string
    {
        return $this->systolic_pressure . ' mm Hg';
    }

    public function getDiastolicBloodPressureAttribute(): string
    {
        return $this->diastolic_pressure . ' mm Hg';
    }

    public function getStatusColorAttribute(): string
    {
        return [
                   'normal'                      => 'green-800',
                   'elevated'                    => 'yellow-300',
                   'high_blood_pressure_stage_1' => 'yellow-500',
                   'high_blood_pressure_stage_2' => 'yellow-600',
                   'hypertensive_crisis'         => 'red-800',
               ][$this->status] ?? 'cool-gray';
    }
}
