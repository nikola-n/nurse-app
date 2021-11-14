<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Livewire\BloodPressure\BloodPressureEdit;
use App\Http\Livewire\BloodPressure\BloodPressureCreate;

class BloodPressureTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function patient_show_page_contains_blood_pressure_table_livewire_component()
    {
        $patient = Patient::create([
            'name'  => 'Nikola',
            'email' => 'nikola.najdov95@gmail.com',
        ]);

        $this->get(route('patients.show', $patient))
            ->assertSeeLivewire('blood-pressure-reading-table');
    }

    /** @test */
    public function blood_pressure_create_page_contains_patient_create_livewire_component()
    {
        $patient = Patient::create([
            'name'  => 'Nikola',
            'email' => 'nikola.najdov95@gmail.com',
        ]);

        $this->get(route('patients.readings.create', $patient))
            ->assertSeeLivewire('blood-pressure.blood-pressure-create');
    }

    /** @test */
    public function blood_pressure_edit_page_contains_patient_edit_livewire_component()
    {
        $patient = Patient::create([
            'name'  => 'Nikola',
            'email' => 'nikola.najdov95@gmail.com',
        ]);

        $reading = $patient->bloodPressureReadings()->create([
            'systolic_pressure'  => 132,
            'diastolic_pressure' => 180,
            'status'             => 'hypertensive_crisis',
            'measured_at'        => now()->subDay(),
        ]);

        $this->get(route('patients.readings.edit', [$patient, $reading]))
            ->assertSeeLivewire('blood-pressure.blood-pressure-edit');
    }

    /** @test */
    public function blood_reading_create_page_form_works()
    {
        $patient = Patient::create([
            'name'  => 'Nikola',
            'email' => 'nikola.najdov95@gmail.com',
        ]);

        Livewire::test(BloodPressureCreate::class, ['patient' => $patient])
            ->set('systolic_pressure', '321')
            ->set('diastolic_pressure', '89')
            ->set('status', 'normal')
            ->set('measured_at', now())
            ->call('save')
            ->assertSee('Blood Pressure reading was created!');

        $this->assertDatabaseHas('blood_pressure_readings', ['patient_id' => $patient->id]);
    }

    /** @test */
    public function blood_pressure_edit_page_form_works()
    {
        $patient       = Patient::create([
            'name'  => 'Nikola',
            'email' => 'nikola.najdov95@gmail.com',
        ]);
        $bloodPressure = $patient->bloodPressureReadings()->create([
            'systolic_pressure'  => 132,
            'diastolic_pressure' => 180,
            'status'             => 'hypertensive_crisis',
            'measured_at'        => now()->subDay(),
        ]);

        Livewire::test(BloodPressureEdit::class, ['patient' => $patient, 'reading' => $bloodPressure])
            ->set('reading.systolic_pressure', '10')
            ->set('reading.diastolic_pressure', '30')
            ->set('reading.status', 'elevated')
            ->set('reading.measured_at', now())
            ->call('save')
            ->assertSee('Reading details were updated successfully!');

        $bloodPressure->refresh();

        $this->assertEquals('elevated', $bloodPressure->status);
    }
}
