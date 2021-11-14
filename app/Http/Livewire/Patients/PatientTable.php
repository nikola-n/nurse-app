<?php

namespace App\Http\Livewire\Patients;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class PatientTable extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make('Name')
                ->sortable()
                ->searchable()
                ->addClass('hidden md:table-cell'),
            Column::make('E-mail', 'email')
                ->searchable(),
            Column::make('Phone'),
            Column::make('Date of Birth'),
            Column::blank(),
            Column::blank(),
            Column::blank(),
        ];
    }

    public function query(): Builder
    {
        return Patient::query()
            ->withCount('bloodPressureReadings')
            ->orderByDesc('created_at');
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.patient_table';
    }

    public function editPatient(Patient $patient)
    {
        return redirect()->to(route('patients.edit', $patient));
    }

    public function deletePatient(Patient $patient)
    {
        $patient->delete();
    }

    public function showPatient(Patient $patient)
    {
        return redirect()->to(route('patients.show', $patient));

    }
}
