<?php

namespace App\Http\Livewire\Patients;

use Livewire\Component;
use App\Models\Patient;

class PatientEdit extends Component
{
    public Patient $patient;

    public $successMessage;

    protected $rules = [
        'patient.name'          => 'required',
        'patient.email'         => 'email',
        'patient.date_of_birth' => 'date',
        'patient.phone'         => 'nullable',
        'patient.gender'        => 'nullable',
    ];

    //real-time validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        $this->patient->save();

        $this->successMessage = 'Patient details were updated successfully!';
    }

    public function back()
    {
        return redirect()->to(route('patients.index'));
    }

    public function render()
    {
        return view('livewire.patients.edit');
    }
}
