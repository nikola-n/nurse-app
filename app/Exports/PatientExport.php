<?php

namespace App\Exports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PatientExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    public function query()
    {
        return Patient::query()
            ->with('bloodPressureReadings')
            ->withCount('bloodPressureReadings');
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Phone',
            'Date of Birth',
            'Gender',
            'Become patient on',
            'Number of Blood Pressure Readings',
        ];
    }

    /**
     * @param mixed $row
     *
     * @return array
     */
    public function map($row): array
    {
        return [
            $row->id,
            $row->name,
            $row->email,
            $row->phone,
            $row->date_of_birth,
            $row->gender,
            $row->created_at->format('d-m-Y H:i'),
            $row->blood_pressure_readings_count,
        ];
    }

}
