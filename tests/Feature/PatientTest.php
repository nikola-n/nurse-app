<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use App\Models\Patient;
use App\Http\Livewire\Patients\PatientEdit;
use App\Http\Livewire\Patients\PatientCreate;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PatientTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function patient_index_page_contains_patient_export_and_patient_table_livewire_component()
    {
        $patient = Patient::create([
            'name'  => 'Nikola',
            'email' => 'nikola.najdov95@gmail.com',
        ]);

        $this->get(route('patients.index', $patient))
            ->assertSeeLivewire('patients.patient-export')
            ->assertSeeLivewire('patient-table');
    }

    /** @test */
    public function patient_create_page_contains_patient_create_livewire_component()
    {
        $this->get(route('patients.create'))
            ->assertSeeLivewire('patients.patient-create');
    }

    /** @test */
    public function patient_edit_page_contains_patient_edit_livewire_component()
    {
        $patient = Patient::create([
            'name'  => 'Nikola',
            'email' => 'nikola.najdov95@gmail.com',
        ]);

        $this->get(route('patients.edit', $patient))
            ->assertSeeLivewire('patients.patient-edit');
    }

    /** @test */
    public function patient_create_page_form_works()
    {
        Livewire::test(PatientCreate::class)
            ->set('name', 'Nikola')
            ->set('email', 'nikola@gmail.com')
            ->set('phone', '+32132323')
            ->set('gender', 'male')
            ->set('date_of_birth', now()->subYears(26))
            ->call('save')
            ->assertSee('Patient Nikola was created!');

        $this->assertDatabaseHas('patients', ['name' => 'Nikola']);
    }

    /** @test */
    public function patient_edit_page_form_works()
    {
        $patient = Patient::query()->create([
            'name'          => 'Nikola',
            'email'         => 'nikola.najdov95@gmail.com',
            'phone'         => '+38970313321',
            'gender'        => 'male',
            'date_of_birth' => now()->subYears(26),
        ]);

        Livewire::test(PatientEdit::class, ['patient' => $patient])
            ->set('patient.name', 'NikolaEdited')
            ->set('patient.email', 'nikola.najdovedited95@gmail.com')
            ->call('save')
            ->assertSee('Patient details were updated successfully!');

        $patient->refresh();

        $this->assertEquals('NikolaEdited', $patient->name);
        $this->assertEquals('nikola.najdovedited95@gmail.com', $patient->email);
    }
}
