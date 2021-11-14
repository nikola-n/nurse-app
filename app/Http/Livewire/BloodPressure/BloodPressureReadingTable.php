<?php

namespace App\Http\Livewire\BloodPressure;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\BloodPressureReading;

class BloodPressureReadingTable extends DataTableComponent
{
    public Patient $patient;

    public function columns(): array
    {
        return [
            Column::make('Systolic'),
            Column::make('Diastolic'),
            Column::make('Status')
                ->searchable(),
            Column::make('Measured On'),
            Column::blank(),
        ];
    }

    public function query()
    {
        return $this->patient->bloodPressureReadings()->orderByDesc('measured_at');
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.blood_pressure_reading_table';
    }

    public function editBloodPressure(BloodPressureReading $reading)
    {
        return redirect()->to(route('patients.readings.edit', [$reading->patient, $reading]));
    }
}
