<?php

use App\Models\BloodPressureReading;
use App\Models\Patient;

if ( ! function_exists('genderOptions')) {

    function genderOptions(): array
    {
        return [
            'Select Gender',
            Patient::GENDER_MALE   => ucfirst(Patient::GENDER_MALE),
            Patient::GENDER_FEMALE => ucfirst(Patient::GENDER_FEMALE),
        ];
    }
}

if ( ! function_exists('statusOptions')) {

    function statusOptions(): array
    {
        $array = BloodPressureReading::STATUSES;
        array_unshift($array, 'Select Status');

        return $array;
    }
}


