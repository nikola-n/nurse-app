<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    public const GENDER_FEMALE = 'female';
    public const GENDER_MALE = 'male';

    protected $fillable = [
        'name',
        'email',
        'date_of_birth',
        'phone',
        'gender',
    ];

    public function bloodPressureReadings(): HasMany
    {
        return $this->hasMany(BloodPressureReading::class);
    }
}
