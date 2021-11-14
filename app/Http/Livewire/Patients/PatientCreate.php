<?php

namespace App\Http\Livewire\Patients;

use Livewire\Component;
use App\Models\Patient;

class PatientCreate extends Component
{
    public $successMessage;

    public $name;

    public $email;

    public $date_of_birth;

    public $phone;

    public $gender;

    protected $rules = [
        'name'          => 'required',
        'email'         => 'email',
        'date_of_birth' => 'date',
        'phone'         => 'nullable',
        'gender'        => 'nullable',
    ];

    //real-time validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        Patient::create([
            'name'          => $this->name,
            'email'         => $this->email,
            'date_of_birth' => $this->date_of_birth,
            'phone'         => $this->phone,
            'gender'        => $this->gender,
        ]);

        $this->successMessage = 'Patient ' . $this->name . ' was created!';
    }

    public function back()
    {
        return redirect()->to(route('patients.index'));
    }

    public function render()
    {
        return view('livewire.patients.create');
    }
}
