<?php

namespace App\Http\Livewire\BloodPressure;

use App\Models\Patient;
use Livewire\Component;

class BloodPressureCreate extends Component
{
    public Patient $patient;

    public $systolic_pressure;

    public $diastolic_pressure;

    public $measured_at;

    public $status;

    public $successMessage;

    protected $rules = [
        'systolic_pressure'  => 'required',
        'diastolic_pressure' => 'required',
        'measured_at'        => 'required|date',
        'status'             => 'nullable',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        $this->patient->bloodPressureReadings()->create([
            'systolic_pressure'  => $this->systolic_pressure,
            'diastolic_pressure' => $this->diastolic_pressure,
            'measured_at'        => $this->measured_at,
            'status'             => $this->status,
        ]);

        $this->successMessage = 'Blood Pressure reading was created!';
    }

    public function back()
    {
        return redirect()->to(route('patients.show', $this->patient));
    }

    public function render()
    {
        return view('livewire.blood-pressure.create');
    }
}
