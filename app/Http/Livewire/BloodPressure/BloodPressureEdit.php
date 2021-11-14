<?php

namespace App\Http\Livewire\BloodPressure;

use Livewire\Component;
use App\Models\Patient;
use App\Models\BloodPressureReading;

class BloodPressureEdit extends Component
{
    public Patient $patient;

    public BloodPressureReading $reading;

    public $successMessage;

    protected $rules = [
        'reading.systolic_pressure'  => 'required',
        'reading.diastolic_pressure' => 'required',
        'reading.measured_at'        => 'date|required',
        'reading.status'             => 'nullable',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        $this->reading->save();

        $this->successMessage = 'Reading details were updated successfully!';
    }

    public function back()
    {
        return redirect()->to(route('patients.show', $this->patient));
    }

    public function render()
    {
        return view('livewire.blood-pressure.edit');
    }
}
